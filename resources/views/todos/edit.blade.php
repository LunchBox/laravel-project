<x-basic-main>
  <x-slot name="page_header">
    {{ __('Edit Todo') }}
  </x-slot>

  <form action="{{route('todos.update', $todo->id)}}" method="post" class="mt-4 p-4">
      @csrf
      @method('PUT')
      <div class="form-group m-3">
          <label for="name">Todo Name</label>
          <input type="text" name="name" value="{{$todo->name}}" class="@error('name') border-red-500 @enderror">
          @error('name')
            <div class="text-red-500">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group m-3">
          <label for="description">Todo Description</label>
          <textarea name="description" rows="3" class="@error('name') border-red-500 @enderror">{{$todo->description}}</textarea>
          @error('description')
            <div class="text-red-500">{{ $message }}</div>
          @enderror
      </div>
      <div class="form-group m-3">
          <input type="submit" class="btn btn-primary float-end" value="Submit">
      </div>
  </form>
</x-basic-main>
