<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instrumento;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;

class InstrumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Instrumento::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
			'nome_instrumento' => 'required|string|max:255',
			'afinacao' => 'required|string|max:255',
			'naipe' => 'required|string|max:255',
		]);

		$instrumento = Instrumento::create($request->only([
			'nome_instrumento',
			'afinacao',
			'naipe'])
		);

		return response()->json([
			'message' => 'Instrumento created successfully',
			'data' => $instrumento
		], 201);
    }

    /**
     * Display the specified resource.
     */
	public function show(string $id)
	{
		$instrumento = Instrumento::with('musicas')->findOrFail($id);
		return response()->json($instrumento);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id): JsonResponse
	{
		$instrumento = Instrumento::findOrFail($id);

		$request->validate([
			'nome' => 'required|string|max:255',
			'afinacao' => 'nullable|string|max:255'
		]);

		$instrumento->update($request->only([
			'nome',
			'afinacao'
		]));

		return response()->json($instrumento->load('musicas'));
	}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $instrumento = Instrumento::findOrFail($id);
        $instrumento->delete();

        return response()->json(['message' => 'Instrumento deletado com sucesso']);
    }
}
