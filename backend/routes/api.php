<?php
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InstrumentoController;
use App\Http\Controllers\Api\MusicaController;

Route::apiResource('tasksApi', TasksController::class);

// Rotas para Instrumentos
Route::apiResource('instrumentos', InstrumentoController::class);

// Rotas para mUSICAS
Route::apiResource('musicas', MusicaController::class);
