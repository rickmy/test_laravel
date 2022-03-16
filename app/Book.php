<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

  protected $dates = ['date'];

  public function categorie()
  {
    return $this->belongsTo(Categorie::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class); // Muchos a muchos
  }

}
