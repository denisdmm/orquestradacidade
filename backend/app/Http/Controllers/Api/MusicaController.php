<?php

namespace App\Http\Controllers\Api;

use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $musicas = Musica::with(['eventos', 'instrumentos'])->get();
        return response()->json($musicas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nome_musica' => 'required|string|max:255',
            'tom_musica' => 'nullable|string|max:255',
            'andamento' => 'nullable|string|max:255',
            'compositor' => 'nullable|string|max:255',
            'arranjo' => 'nullable|string|max:255',
            'local_armario' => 'nullable|string|max:255',
            'link_digital' => 'nullable|string|max:255',
            'cantata' => 'boolean',
            'nome_cantata' => 'nullable|string|max:255',
            'instrumentos' => 'nullable|array',
            'instrumentos.*' => 'exists:instrumentos,id'
        ]);

        $musica = Musica::create($request->only([
            'nome_musica',
            'tom_musica',
            'andamento',
            'compositor',
            'arranjo',
            'local_armario',
            'link_digital',
            'cantata',
            'nome_cantata'
        ]));

        if ($request->has('instrumentos')) {
            $musica->instrumentos()->sync($request->instrumentos);
        }

        return response()->json($musica->load(['eventos', 'instrumentos']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $musica = Musica::with(['eventos', 'instrumentos'])->findOrFail($id);
        return response()->json($musica);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $musica = Musica::findOrFail($id);

        $request->validate([
            'nome_musica' => 'required|string|max:255',
            'tom_musica' => 'nullable|string|max:255',
            'andamento' => 'nullable|string|max:255',
            'compositor' => 'nullable|string|max:255',
            'arranjo' => 'nullable|string|max:255',
            'local_armario' => 'nullable|string|max:255',
            'local_digital' => 'nullable|string|max:255',
            'cantata' => 'boolean',
            'nome_cantata' => 'nullable|string|max:255',
            'instrumentos' => 'nullable|array',
            'instrumentos.*' => 'exists:instrumentos,id'
        ]);

        $musica->update($request->only([
            'nome_musica',
            'tom_musica',
            'andamento',
            'compositor',
            'arranjo',
            'local_armario',
            'local_digital',
            'cantata',
            'nome_cantata'
        ]));

        if ($request->has('instrumentos')) {
            $musica->instrumentos()->sync($request->instrumentos);
        }

        return response()->json($musica->load(['eventos', 'instrumentos']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $musica = Musica::findOrFail($id);
        $musica->delete();

        return response()->json(['message' => 'Música deletada com sucesso']);
    }
}

