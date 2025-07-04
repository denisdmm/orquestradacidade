<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::view('/{any}', 'welcome')->where('any', '.*');


Route::apiResource('tasks', TasksController::class);