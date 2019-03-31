<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Publisher;
use App\Genre;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $genres = Genre::all();

        return view('books', ['books' => $books, 'authors' => $authors, 'publishers' => $publishers, 'genres' => $genres]);
    }

    public function create(Request $request)
    {
        // dd($request->input());
        $book = new Book();
        $book->title = $request->input('bookTitle');
        $book->description = $request->input('bookDescription');
        $book->release_date = $request->input('bookReleaseDate');
        $book->author_id = $request->input('bookAuthor');
        $book->publisher_id = $request->input('bookPublisher');
        $book->save();

        return redirect('/books');
    }
}
