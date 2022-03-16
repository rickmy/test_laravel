@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <h3 class="text-muted text-center my-2">Books</h3>
      </div>
      <div class="col-2">
        <a href="{{route('books.create')}}" class="btn btn-primary btn-sm my-2">New Book</a>
      </div>
      <div class="col-md-10">
        @if ( session('msg') )
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('msg')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @foreach ($books as $book)
          <div class="card mb-3">
            <div class="card-header">{{$book->date->format('d M Y')}}</div>

            <div class="card-body">
              <div class="row">
                <div class="col-md-5 ">
                  <img class="img-fluid " src=" {{ Storage::url($book->photo_book) }}" alt="">
                </div>

                <div class="col-md-7">
                  <h3>{{$book->title_book}}</h3>
                  <p>Category: {{ $book->categorie->categorie_name }}</p>
                  <p>{{ $book->description }}</p>
                  <p>{{ $book->content }}</p>
                  <div>

                    <p>
                      <a href="#" data-toggle="collapse"
                         data-target="#collapseExample{{$book->id}}" aria-expanded="false" aria-controls="collapseExample{{$book->id}}">
                        See more...</a>
                    </p>
                    <div class="collapse" id="collapseExample{{$book->id}}">
                      <a href="{{ route('books.edit', $book) }}" class="btn btn-warning mx-1">Edit</a>
                      <form action=" {{ route('books.destroy',$book->id) }}" class="d-inline" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"> Delete </button>
                      </form>
                    </div>

                    @foreach ($book->tags as $tag)
                      <span class="badge badge-primary my-2"># {{ $tag->tag_name }}</span>
                    @endforeach

                  </div>
                </div>
              </div>

            </div>
          </div>
        @endforeach
        {{$books->links()}}

      </div>
    </div>
  </div>
@endsection
