@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <span>New Book</span>
            <a href="{{route('books.index')}}" class="btn btn-primary btn-sm">Back to list</a>
          </div>
          <div class="card-body">
            @if ( session('msg') )
              <div class="alert alert-success">{{ session('msg') }}</div>
            @endif
            <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="title_book">Title</label>
                  <input type="text" class="form-control" name="title_book" id="title_book" >
                </div>
                <div class="form-group col-md-6">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description" >
                </div>
              </div>
              <div class="form-group">
                <label for="content_book">Content</label>
                <input type="text" class="form-control" name="content_book" id="content_book">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="content">Categorie</label>
                  <select name="categorie_id" id="categorie_id" class="form-control">
                    <option value="null">Select</option>
                    @foreach($categories as $categorie)
                      <option value="{{$categorie->id}}">{{$categorie->categorie_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="content">Tags</label>
                  <select name="tags" id="tags" class="form-control">
                    <option value="null">Select</option>
                    @foreach($tags as $tag)
                      <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="photo_book">Book's photo</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="photo_book" name="photo_book" accept="image/*">
                  <label class="custom-file-label" for="photo_book">Choose file</label>
                </div>
              </div>
              <button class="btn btn-primary btn-block" type="submit">Upload</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
