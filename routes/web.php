<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;

Route::get('/', function () {
  $tasks = Task::all();
  return view('tasks.index', compact('tasks'));
});