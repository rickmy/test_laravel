@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="text-muted text-center my-2">Courses</h2>

    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{auth()->user()->name}}'s course list</span>
            <a href=" {{route('courses.create')}} " class="btn btn-primary btn-sm">New Course</a>
          </div>

          <div class="card-body">
            <table class="table">
              <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($courses as $item)
                <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->name_course }}</td>
                  <td>{{ $item->description_course }}</td>
                  <td>
                    <a href="{{route('courses.edit', $item)}}" class="btn btn-warning">Edit</a>
                      <form action=" {{ route('courses.destroy',$item) }}" class="d-inline" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger"> Delete </button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            {{$courses->links()}}
            {{-- fin card body --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
