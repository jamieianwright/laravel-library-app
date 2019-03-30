<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function Author () {
        return $this->belongsTo('App\Author');
    }

    public function Publisher () {
        return $this->belongsTo('App\Publisher');
    }

    public function Genres () {
        return $this->belongsToMany( 'App\Genre', 'books_genres', 'book_id', 'genre_id' );
    }
}
