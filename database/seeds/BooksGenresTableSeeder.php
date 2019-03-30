<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('books_genres')->insert([
                'book_id' => rand(1,10),
                'genre_id' => rand(1,10),
            ]);
    	}
    }
}
