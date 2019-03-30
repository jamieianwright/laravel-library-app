<?php

use Illuminate\Database\Seeder;
use App\Publisher;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $publisher = new Publisher();
            $publisher->name = Str::random(10);
            $publisher->save();
    	}
    }
}
