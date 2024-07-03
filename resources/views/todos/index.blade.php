<x-basic-main>
    <x-slot name="page_header">
      {{ __('All Todos') }}
    </x-slot>

    <table class="table-auto">
        <tr>
            <th class="text-nowrap">Task Name</th>
            <th class="w-100">Description</th>
            <th>Creator</th>
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
            </tr>
        @endforeach
    </table>
</x-basic-main>


