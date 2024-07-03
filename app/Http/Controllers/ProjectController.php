<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
      return view('projects.index', [
        'projects' => Auth::user()->projects()->get()
      ]);
    }

    public function create()
    {
      return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
      $request->validate([
        'name' => 'required',
        'description' => 'required'
      ]);

      $project = new Project;
      $project->name = $request['name'];
      $project->description = $request['description'];

      # set the current user as the owner
      $project->user()->associate(Auth::user());
      # $project->user()->associate($request->user());
      # $project->user_id = Auth::id();

      $project->save();

      return redirect(route('projects.index'));
    }

    public function show(Project $project)
    {
      return view('projects.show', [
        'project' => $project,
        'todos' => $project->todos()->get()
      ]);
    }

    public function edit(Project $project)
    {
      return view('projects.edit', [
        'project' => $project
      ]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
      $request->validate([
        'name' => 'required',
        'description' => 'required'
      ]);

      $project->name = $request['name'];
      $project->description = $request['description'];
      $project->save();

      return redirect(route('projects.index'));
    }

    public function destroy(Project $project)
    {
      $project->delete();
      return redirect(route("projects.index"));
    }
}
