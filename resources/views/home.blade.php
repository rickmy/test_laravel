@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Dashboard</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

              <div class="card-columns">
                <div class="card">
                  <img class="card-img-top" src="https://api.lorem.space/image/face?w=400&h=225"  alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Photos</h5>
                    <a href="{{route('photos.index')}}" class="card-link">Go</a>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="https://api.lorem.space/image/movie?w=400&h=225" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Blog</h5>
                    <a href="{{route('blog')}}" class="card-link">Go</a>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="https://api.lorem.space/image/book?w=400&h=225"  alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">About Us</h5>
                    <a href="{{route('aboutUs')}}" class="card-link">Go</a>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="https://api.lorem.space/image/fashion?w=400&h=225"  alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Notes</h5>
                    <a href="{{route('notes')}}" class="card-link">Go</a>

                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="https://api.lorem.space/image/furniture?w=400&h=225"  alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Courses</h5>
                    <a href="{{route('courses.index')}}" class="card-link">Go</a>
                  </div>
                </div>
              </div>
          </div>


        </div>


      </div>
    </div>
  </div>
@endsection
