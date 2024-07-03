<x-basic-main>
  <x-slot name="page_header">
    {{ __('Todo Details') }}
  </x-slot>

  <div>
    {{$todo->name}}
  </div>
  <div>
    {{$todo->description}}
  </div>
</x-basic-main>
