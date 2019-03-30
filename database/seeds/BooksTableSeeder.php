<?php

use Illuminate\Database\Seeder;
use carbon\Carbon;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->title = Str::random(10);
            $book->description = Str::random(10);
            $book->release_date = Carbon::now();
            $book->author_id = rand(1,10);
            $book->publisher_id = rand(1,10);
            $book->save();
        };
    }
}
