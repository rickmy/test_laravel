@extends('layouts.app')
@section('content')
  <div class="container">
    <h1 class="my-2 text-center text-muted">Photos</h1>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card border-secondary mb-3">
          <div class="card-header d-flex justify-content-between align-items-center ">
            <span>{{auth()->user()->name}}'s Gallery</span>
            <a href=" {{route('photos.create')}} " class="btn btn-primary btn-sm">New Photo</a></div>

          <div class="card-body text-secondary">
            @isset($photos)
              <div class="row">
                @foreach($photos as $photo)
                  <div class="col-12 col-sm-3 col-md-3">
                    <a href="{{route('photos.show',$photo)}}">
                      <img src="{{ Storage::url($photo->photo) }}" class="img-thumbnail">
                    </a>
                  </div>
                @endforeach
              </div>

            @endisset
            @empty($photos)
              <h5 class="card-title text-center alert alert-danger">Photos don't exist</h5>
            @endempty

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
