<?php
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasksApi', TasksController::class);