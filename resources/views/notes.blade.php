@extends('template')

@section('home')
  <h2>Notes</h2>

  <button type="button" class="btn btn-outline-primary my-2 " data-toggle="modal" data-target="#exampleModal">
    New
  </button>

  @if(session('menssage'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Complete!</strong> {{session('menssage')}}.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  <div class="container">
    <table class="table">
      <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">User</th>
        <th scope="col">Actions</th>
      </tr>
      </thead>
      <tbody>
      @foreach($notes as $note)
        <tr>

          <th scope="row">{{$note->id}}</th>
          <td>{{$note->name}}</td>
          <td>{{$note->description}}</td>
          <td>{{$note->user}}</td>
          <td>
            <a href="{{ route('notes.detail',$note) }}" class="btn btn-outline-info"> See </a>
            <a href="{{ route('notes.edit',$note) }}" class="btn btn-outline-warning"> Edit </a>
            <form action=" {{ route('notes.delete',$note) }}" class="d-inline" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-outline-danger"> Delete </button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    {{ $notes->links() }}
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-group" action="{{ route('notes.save') }}" method="POST">
            @csrf
            <input type="text" name="name" id="name" class="form-control my-2" placeholder="Name"
                   value="{{ old('name') }}" >
            @error('name')
            <div class="alert alert-danger" role="alert">
              Name is required!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @enderror
            <input type="text" name="description" id="description" class="form-control my-2"
                   placeholder="Description" value="{{ old('description') }}">
            @error('description')
            <div class="alert alert-danger" role="alert">
              Description is required!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @enderror
            <input type="text" name="user" id="user" class="form-control my-2"
                   placeholder="User" value="{{ old('user') }}">
            @error('user')
            <div class="alert alert-danger" role="alert">
              User is required!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @enderror
            <button class="btn btn-outline-primary btn-block" type="submit">Save</button>
          </form>
        </div>
      </div>
    </div>
@endsection
