<x-basic-main>
    <x-slot name="page_header">
      {{ __('Todos') }}
    </x-slot>

    <div class="mb-4">
        <a href="{{route('todos.create')}}" class="btn btn-primary">
          <span class="">Create Todo</span>
        </a>
    </div>

    <table class="table-auto">
        <tr>
            <th class="text-nowrap">Task Name</th>
            <th class="w-100">Description</th>
            <th>Creator</th>
            <th>Action</th>
        </tr>
        @foreach($todos as $todo)
            <tr valign="middle">
                <td class="whitespace-nowrap">
                  <a href="{{route("todos.show", $todo->id)}}">
                    {{$todo->name}}
                  </a>
                </td>
                <td>{{$todo->description}}</td>
                <td>{{$todo->user ? $todo->user->name : ''}}</td>
                <td class="whitespace-nowrap">
                    <div class="flex gap-1">
                      <a href="{{route("todos.edit", $todo->id)}}" class="btn btn-success btn-sm">Update</a>

                      <form action="{{route("todos.destroy", $todo->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" />
                      </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</x-basic-main>


