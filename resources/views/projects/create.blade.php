<x-basic-main>
  <x-slot name="page_header">
    {{ __('Create Todo') }}
  </x-slot>

  <form action="{{route('projects.store')}}" method="post" class="mt-4 p-4">
      @csrf
      <div class="form-group m-3">
          <label for="name" class="block">Project Name</label>
          <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group m-3">
          <label for="description" class="block">Project Description</label>
          <textarea class="w-64" name="description" rows="3"></textarea>
      </div>
      <div class="form-group m-3">
          <input type="submit" class="btn btn-primary" value="Submit">
      </div>
  </form>
</x-basic-main>


