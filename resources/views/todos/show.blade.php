@extends('layouts.app')
@section('title')
  Todo: {{ $todo->name }}
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
           <div>
              {{$todo->name}}
           </div>
           <div>
              {{$todo->description}}
           </div>
        </div>
    </div>

@endsection
