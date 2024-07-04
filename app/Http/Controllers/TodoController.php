<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\EditTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Models\Project;

use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
  // list current user's todos only
  public function mine()
  {
    return view('todos.mine', [
      'todos' => Auth::user()->todos()->get()
    ]);
  }

  // list all todos
  public function index()
  {
    return view('todos.index', [
      'todos' => Todo::all()
    ]);
  }

  // display a form to create a todo
  public function create(CreateTodoRequest $request, Project $project)
  {
    return view('todos.create', [
      'project' => $project
    ]);
  }

  // store todo into database
  public function store(StoreTodoRequest $request, Project $project)
  {
    // retrieve the validated data
    $validated = $request->validated();
    $todo = new Todo($validated);

    // set the current user as the owner
    $todo->user()->associate(Auth::user());
    // $todo->user()->associate($request->user());
    // $todo->user_id = Auth::id();
    
    if(!empty($project->id)) {
      $todo->project()->associate($project);
    }

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
  public function edit(EditTodoRequest $request, Todo $todo)
  {
    return view('todos.edit', [
      'todo' => $todo
    ]);
  }

  // update a todo
  public function update(UpdateTodoRequest $request, Todo $todo)
  {
    $todo->fill($request->validated());
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
