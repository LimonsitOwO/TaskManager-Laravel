<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/my-task', function () {
  return view('task.my-task');
});
Route::get('/create-task', function () {
  return view('task.create-task');
});