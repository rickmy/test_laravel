<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
  public function index()
  {
    return view('welcome');
  }

  public function photos()
  {
    return view('photos');
  }

  public function blog()
  {
    return view('blog');
  }

  public function aboutUs($name = null)
  {
    $equipo = ['Aby','Martin', 'Max','Laika'];
    return view('aboutUs', compact('equipo', 'name'));
  }




}
