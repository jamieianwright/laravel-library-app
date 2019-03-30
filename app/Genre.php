<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function Genre () {
        return $this->belongsToMany( 'App\Book', 'books_genres', 'genre_id', 'book_id' );
    }
}
