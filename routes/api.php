<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('task', [TaskController::class, 'createTask']);
Route::get('task', [TaskController::class, 'findAllTask']);
Route::get('task/{id}', [TaskController::class, 'findTaskById']);
Route::put('task/{id}', [TaskController::class, 'updateTask']);
Route::delete('task/{id}', [TaskController::class, 'deleteTask']);
