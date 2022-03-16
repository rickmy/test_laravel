<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $userId = auth()->user()->id;
    $photos = Photo::all()->where('user_id', $userId);

    return view('photos.photoList', compact('photos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('photos.photosCreate');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
      'photo'=> 'required'
    ]);

    $uploadPhoto = $request->file('photo')->store('public');
    $userResource = auth()->user();
    $newPhoto = new Photo();

    $newPhoto->user_id = $userResource->id;
    $newPhoto->photo = $uploadPhoto;

    $newPhoto->save();

    return back()->with('msg','photo upload complete!.');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {

    $photoDB = Photo::findOrFail($id);
    $userDB = User::findOrFail($photoDB->user_id);

    return view('photos.photoShow', compact('photoDB','userDB'));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $photoDB = Photo::findOrFail($id);

    $photoDB->delete();

    return redirect('/photos')->with('msg','Photo delete!.');
  }
}
