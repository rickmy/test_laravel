<?php

namespace App\Http\Controllers;

use App\Book;
use App\Categorie;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
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
    $books = Book::where('status', true)->paginate(5);

    return view('books.listBook', compact('books'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Categorie::all()->where('status',true);
    $tags = Tag::all();
    return view('books.createBook', compact('categories','tags'));
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
      'title_book'=>'required',
      'description'=>'required',
      'content_book'=>'required',
      'categorie_id'=>'required',
      'photo_book'=>'required',
    ]);

    $newBook = new Book();

    $photoBook = $request->file('photo_book')->store('public/books');

    $newBook->title_book = $request->title_book;
    $newBook->description = $request->description;
    $newBook->content = $request->content_book;
    $newBook->categorie_id = $request->categorie_id;
    $newBook->date = Carbon::now();
    $newBook->photo_book = $photoBook;

    $newBook->save();

    $newBook->tags()->attach([$request->tags]);

    return redirect('/books')->with('msg','book register complete!');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $book = Book::findOrFail($id);
    $categories = Categorie::all()->where('status',true);
    $tags = Tag::all();
    return view('books.editBook',compact('book','categories','tags'));
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

    $bookDB =  Book::findOrFail($id);

    $hasPhoto = $request->hasFile('photo_book');


    if($hasPhoto){
      $bookDB->photo_book  = $request->file('photo_book')->store('public/books');
    }

    $bookDB->title_book = $request->title_book;
    $bookDB->description = $request->description;
    $bookDB->content = $request->content_book;
    $bookDB->categorie_id = $request->categorie_id;
    $bookDB->date = Carbon::now();
    $bookDB->save();

    $bookDB->tags()->attach([$request->tags]);

    return redirect('/books')->with('msg','book update complete!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $bookDB = Book::findOrFail($id);
    $bookDB->status = false;

    $bookDB->save();

    return redirect('/books')->with('msg','delete complete!');

  }
}
