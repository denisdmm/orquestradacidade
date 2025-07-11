<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		return \App\Models\Task::all();
	}
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$task = \App\Models\Task::create($request->all());
		return response()->json($task, 201);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//  return $task;

	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
