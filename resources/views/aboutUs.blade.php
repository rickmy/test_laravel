@extends('template')
@section('home')
  <h2>About Us</h2>

  <ul>
    @foreach($equipo as $miembro)

    <li>
      <a href="{{route('aboutUs',$miembro)}}">  {{$miembro}}
      </a>
    </li>
    @endforeach
  </ul>

  @if(!empty($name))
    <p class="my-2 text-black-50">Nombre: {{$name}}</p>
    <p class="my-md-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, itaque?</p>
  @endif
@endsection
