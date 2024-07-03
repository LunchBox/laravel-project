<x-basic-main>
    <x-slot name="page_header">
      {{ __('My Projects') }}
    </x-slot>

    <div class="mb-4">
        <a href="{{route('projects.create')}}" class="btn btn-primary">
          <span class="">Create Project</span>
        </a>
    </div>

    <table class="table-auto">
        <tr>
            <th class="text-nowrap">Project Name</th>
            <th class="w-100">Description</th>
            <th>Creator</th>
            <th>Action</th>
        </tr>
        @foreach($projects as $project)
            <tr valign="middle">
                <td class="whitespace-nowrap">
                  <a href="{{route("projects.show", $project->id)}}">
                    {{$project->name}}
                  </a>
                </td>
                <td>{{$project->description}}</td>
                <td>{{$project->user ? $project->user->name : ''}}</td>
                <td class="whitespace-nowrap">
                    <div class="flex gap-1">
                      <a href="{{route("projects.edit", $project->id)}}" class="btn btn-success btn-sm">Update</a>

                      <form action="{{route("projects.destroy", $project->id)}}" method="post">
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


