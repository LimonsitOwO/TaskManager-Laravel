<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $tasks = Task::all();
    return response()->json($tasks);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
    ]);

    $task = Task::create($validated);
    return redirect('/');
  }

  /**
   * Display the specified resource.
   */
  public function show(Task $task)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Task $task)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    $task = Task::find($id);
    $task->title = $request->title;
    $task->description = $request->description;
    $task->due_date = $request->due_date;
    $task->completed = $request->completed;
    $task->save();
    return redirect('/');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Task $task)
  {
    $task->delete();
    return redirect('/');
  }
}
