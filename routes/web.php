<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;


Route::get('/', function () {
    $tasks = Task::orderByRaw("
        FIELD(status, 'pendiente', 'completada', 'vencida') ASC
    ")
    ->orderByRaw("CASE WHEN due_date IS NULL THEN 1 ELSE 0 END")
    ->orderBy('due_date', 'ASC')
    ->get();

    return view('tasks.index', compact('tasks'));
});
