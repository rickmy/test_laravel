@extends('template')

@section('home')

  <div class="container">

    @if(session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Complete!</strong> {{session('msg')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <h3 class="text-center my-2 text-muted">Edit Note id: {{$note->id}} </h3>
    <hr>
    <form class="form-group" action="{{ route('notes.update', $note->id) }}" method="POST">
      @method('PUT')
      @csrf
      <input type="text" name="name" id="name" class="form-control my-2" placeholder="Name"
             value="{{ $note->name }}" >
      @error('name')
      <div class="alert alert-danger" role="alert">
        Name is required!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @enderror
      <input type="text" name="description" id="description" class="form-control my-2"
             placeholder="Description" value="{{ $note->description }}">
      @error('description')
      <div class="alert alert-danger" role="alert">
        Description is required!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @enderror
      <input type="text" name="user" id="user" class="form-control my-2"
             placeholder="Description" value="{{ $note->user }}">
      @error('user')
      <div class="alert alert-danger" role="alert">
        user is required!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @enderror
      <button class="btn btn-outline-warning btn-block" type="submit">Save</button>
    </form>
  </div>


@endsection
