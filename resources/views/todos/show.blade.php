<x-basic-main>
  <x-slot name="page_header">
    {{ __('Todo') }}: {{ $todo-> name }}
  </x-slot>

  <div>
    {{$todo->description}}

    <div class="my-4">
      <a href="{{route("todos.edit", $todo)}}" class="btn btn-success btn-sm">Edit</a>
    </div>
  </div>
</x-basic-main>
