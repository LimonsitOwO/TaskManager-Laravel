<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Http\Request;

Route::apiResource('tasks', TaskController::class);

Route::middleware(AuthMiddleware::class)->get('/profile', function (Request $request) {
  $user = $request->attributes->get('user');
  return response()->json($user);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);