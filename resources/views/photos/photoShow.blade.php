@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row bg-white p-3 border rounded">
      <div class="col-12">
        <a href="{{route('photos.index')}}" class="btn btn-info btn-sm my-2 float-right">back to list</a>
      </div>
      <div class="col-12 col-md-5">
        <img class="img-fluid" src="{{Storage::url($photoDB->photo)}}" alt="photo">
      </div>
      <div class="col-12 col-md-6 border-left">
        <h5>Photo Detail:</h5>
        <p>
          photo path: {{$photoDB->photo}}
        </p>
        <p>
          date: {{$photoDB->created_at}}
        </p>
        <hr>
        <h5>User:</h5>
        <p>UserName: {{$userDB->name}}</p>
        <hr>
        <h5>Action</h5>
        <form action=" {{ route('photos.destroy',$photoDB) }}" class="d-inline" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-lg btn-block"> Delete </button>
        </form>
      </div>
    </div>
  </div>
@endsection
