<?php

use Illuminate\Database\Seeder;
use App\Book;
use Carbon\Carbon;
use App\Categorie;
use App\Tag;
use Illuminate\Support\Str;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Categorie::truncate();

      $categorie = new Categorie();
      $categorie->categorie_name = "Categorie 1";
      $categorie->save();

      Tag::truncate(); // Evita duplicar datos

      $tag = new Tag();
      $tag->tag_name = "Tag 1";
      $tag->save();

      $tag = new Tag();
      $tag->tag_name = "tag 2";
      $tag->save();

      Book::truncate(); // Evita duplicar datos

      $book = new Book();
      $book->title_book = "Mi primer libro";
      $book->description = "Extracto de mi primer libro";
      $book->content = "<p>Resumen de mi primer libro</p>";
      $book->date = Carbon::now();
      $book->categorie_id = 1;
      $book->save();

      $book->tags()->attach([1, 2]); //Relacionar el libro a dos etiquetas

      $book = new Book();
      $book->title_book = "Mi segundo libro";
      $book->description = "Extracto de mi segundo libro";
      $book->content = "<p>Resumen de mi segundo libro</p>";
      $book->date = Carbon::now();
      $book->categorie_id = 1;
      $book->save();

      $book->tags()->attach([1]); //Relacionar el libro a una etiqueta

      $book = new Book();
      $book->title_book = "Mi tercer libro";
      $book->description = "Extracto de mi tercer libro";
      $book->content = "<p>Resumen de mi tercer libro</p>";
      $book->date = Carbon::now();
      $book->categorie_id = 1;
      $book->save();

      $book->tags()->attach([2]); //Relacionar el libro a una etiqueta
    }
}
