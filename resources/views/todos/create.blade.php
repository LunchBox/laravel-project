<x-basic-main>
  <x-slot name="page_header">
    {{ __('Create Todo') }}
  </x-slot>

  {{$url = empty($project->id) ? route('todos.store') : route('projects.todos.store', $project) }}

  @if ($errors->any())
    <div class="my-4 text-red-500">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{$url}}" method="post" class="mt-4 p-4">
      @csrf
      <div class="form-group m-3">
          <label for="name" class="block">Todo Name</label>
          <input type="text" name="name" class="@error('name') border-red-500 @enderror">
          @error('name')
            <div class="text-red-500">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group m-3">
          <label for="description" class="block">Todo Description</label>
          <textarea name="description" rows="3" class="@error('name') border-red-500 @enderror"></textarea>
          @error('description')
            <div class="text-red-500">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group m-3">
          <input type="submit" class="btn btn-primary" value="Submit">
      </div>
  </form>
</x-basic-main>


