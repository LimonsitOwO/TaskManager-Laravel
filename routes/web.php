<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  $tasks = Task::query()
    ->orderByRaw("FIELD(completed, 0, 1) ASC")
    ->orderByRaw("CASE WHEN due_date IS NULL THEN 1 ELSE 0 END")
    ->orderBy('due_date', 'ASC')
    ->get();


  return view('tasks.index', compact('tasks'));
});

