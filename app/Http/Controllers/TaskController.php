<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function createTask(Request $request)
  {
    $task = new Task;

    $task->title = $request->title;
    $task->description = $request->description;
    $task->due_date = $request->due_date;
    $task->status = $request->status ?? 'pendiente';

    $task->save();
    return redirect('/');
  }

  public function findAllTask(Request $request)
  {
    return Task::all();
  }

  public function findTaskById(Request $request, $id)
  {
    return Task::find($id);
  }

  public function updateTask(Request $request, $id)
  {
    $task = Task::find($id);
    $task->title = $request->title;
    $task->description = $request->description;
    $task->due_date = $request->due_date;
    $task->status = $request->status;
    $task->save();
    return redirect('/');
  }

  public function deleteTask(Request $request, $id)
  {
    $task = Task::find($id);
    $task->delete();
    return redirect('/');
  }
}
