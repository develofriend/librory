<?php

use Librory\Models\Book;
use Librory\Models\Publisher;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = Publisher::pluck('id')->toArray();

        $books = factory(Book::class, rand(80, 90))->create([
            'publisher_id' => rand(0, count($publishers) - 1)
        ]);
    }
}
