<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(PublishersTableSeeder::class);
        $this->call(BooksGenresTableSeeder::class);
    }
}
