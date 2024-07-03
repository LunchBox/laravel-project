<x-basic-main>
  <x-slot name="page_header">
    {{ __('Edit Todo') }}
  </x-slot>

  <form action="{{route('projects.update', $project->id)}}" method="post" class="mt-4 p-4">
      @csrf
      @method('PUT')
      <div class="form-group m-3">
          <label for="name" class="block">Project Name</label>
          <input type="text" class="form-control" name="name" id="name" value="{{$project->name}}">
      </div>
      <div class="form-group m-3">
          <label for="description" class="block">Project Description</label>
          <textarea class="form-control" name="description" id="description" rows="3">{{$project->description}}</textarea>
      </div>
      <div class="form-group m-3">
          <input type="submit" class="btn btn-primary" value="Submit">
      </div>
  </form>
</x-basic-main>
