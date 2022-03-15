@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span>Edit Course {{$course->id}}</span>
            <a href="{{route('courses.index')}}" class="btn btn-primary btn-sm">Back to list</a>
          </div>
          <div class="card-body">
            @if ( session('msg') )
              <div class="alert alert-success">{{ session('msg') }}</div>
            @endif
            <form method="POST" action="{{route('courses.update', $course->id)}}">
              @method('PUT')
              @csrf
              <input
                type="text"
                name="name_course"
                id="name_course"
                placeholder="Name course"
                class="form-control my-2"
                value="{{ $course->name_course }}"
              />
              <input
                type="text"
                name="description_course"
                id="description_course"
                placeholder="Description Courses"
                class="form-control my-2"
                value="{{ $course->description_course }}"
              />
              <button class="btn btn-warning btn-block" type="submit">Save</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
