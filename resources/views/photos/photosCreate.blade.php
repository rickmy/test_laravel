@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span>New Photo</span>
            <a href="{{route('photos.index')}}" class="btn btn-primary btn-sm">Back to list</a>
          </div>
          <div class="card-body">
            @if ( session('msg') )
              <div class="alert alert-success">{{ session('msg') }}</div>
            @endif
            <form method="POST" action="{{route('photos.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*">
                  <label class="custom-file-label" for="photo">Choose file</label>
                </div>
              </div>
              <div class="container">
                <h4>Preview Photo</h4>
                <img id="imagen" src="" alt="">
              </div>
              <button class="btn btn-primary btn-block" type="submit">Upload</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

