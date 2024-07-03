<x-basic-main>
  <x-slot name="page_header">
    {{ $project->name }}
  </x-slot>

  <div>
    <div class="my-4">
      {{$project->description}}
    </div>

    <div class="mb-4">
        <a href="{{route('projects.todos.create', $project)}}" class="btn btn-primary">
          <span class="">Create Todo</span>
        </a>
    </div>

    <ul>
      @foreach($todos as $todo)
        <li>
          <a href="{{route('todos.show', $todo->id)}}">
            {{ $todo->name }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</x-basic-main>
