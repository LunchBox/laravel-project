@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
          <table class="table table-stripped">
              <tr>
                  <th class="text-nowrap">Task Name</th>
                  <th class="w-100">Description</th>
                  <th>Action</th>
              </tr>
              @foreach($todos as $todo)
                  <tr valign="middle">
                      <td class="text-nowrap">
                        <a href="{{route("todos.show", $todo->id)}}">
                          {{$todo->name}}
                        </a>
                      </td>
                      <td>{{$todo->description}}</td>
                      <td class="text-nowrap">
                          <div class="d-flex gap-1">
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
        </div>
    </div>

@endsection
