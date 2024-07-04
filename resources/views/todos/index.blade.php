<x-basic-main>
    <x-slot name="page_header">
      {{ __('All Todos') }}
    </x-slot>

    @if(Auth::guard('admin')->check())
      <div class="mb-4 flex gap-2">
        {{ Auth::guard('admin')->user()->username }}
        &middot;

        <!-- Authentication -->
        <form method="POST" action="{{ route('admin_logout') }}">
            @csrf

            <a :href="route('admin_logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
            </a>
        </form>
      </div>
    @endif

    <table class="table-auto">
        <tr>
            <th class="text-nowrap">Task Name</th>
            <th class="w-100">Description</th>
            <th>Creator</th>
            <th>Project</th>
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
                <td>
                  @if($todo->project) 
                    <a href="{{route('projects.show', $todo->project)}}">
                      {{$todo->project->name}}
                    </a>
                  @endif
                </td>
            </tr>
        @endforeach
    </table>
</x-basic-main>


