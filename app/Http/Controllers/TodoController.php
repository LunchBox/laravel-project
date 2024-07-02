<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
  // list all todos
  public function index()
  {
    return view('todos.index', [
      'todos' => Todo::all()
    ]);
  }

  // display a form to create a todo
  public function create()
  {
    return view('todos.create', []);
  }

  // store todo into database
  public function store(StoreTodoRequest $request)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required'
    ]);

    $todo = new Todo;
    $todo->name = $request['name'];
    $todo->description = $request['description'];
    $todo->save();

    return redirect(route('todos.index'));
  }

  // display todo details
  public function show(Todo $todo)
  {
    return view('todos.show', [
      'todo' => $todo
    ]);
  }

  // edit a todo
  public function edit(Todo $todo)
  {
    return view('todos.edit', [
      'todo' => $todo
    ]);
  }

  // update a todo
  public function update(UpdateTodoRequest $request, Todo $todo)
  {
    $request->validate([
      'name' => 'required',
      'description' => 'required'
    ]);

    $todo->name = $request['name'];
    $todo->description = $request['description'];
    $todo->save();

    return redirect(route('todos.index'));
  }

  // delete a todo
  public function destroy(Todo $todo)
  {
    $todo->delete();
    return redirect(route("todos.index"));
  }
}