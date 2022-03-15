@extends('template')

@section('home')
  <h1> {{ $note->name }} </h1>
  <hr>
  <p class="text-muted">
    Description: {{ $note->description }}
  </p>
  <p class="text-muted">
    User: {{ $note->user }}
  </p>
@endsection
