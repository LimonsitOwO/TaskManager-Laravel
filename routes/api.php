<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [AuthController::class, 'index'])->middleware(AuthMiddleware::class);
Route::get('/users/{id}', [AuthController::class, 'show'])->middleware(AuthMiddleware::class);
Route::put('/users/{id}', [AuthController::class, 'update'])->middleware(AuthMiddleware::class);
Route::delete('/users/{id}', [AuthController::class, 'destroy'])->middleware(AuthMiddleware::class);

Route::apiResource('tasks', TaskController::class)->middleware(AuthMiddleware::class);