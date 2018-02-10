<?php

use Librory\Models\Book;
use Librory\Models\Author;
use Librory\Models\Category;
use Librory\Models\BookCount;
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
        $authors = Author::pluck('name')->toArray();
        $categories = Category::pluck('id')->toArray();

        $books = factory(Book::class, rand(80, 90))->create([
            'publisher_id' => rand(0, count($publishers) - 1)
        ]);

        foreach ($books as $book) {
            $book->recordQuantity(rand(0, 4));

            $authorNames = [];
            $authorCount = rand(1, 3);
            foreach (range(1, $authorCount) as $index) {
                $authorNames[] = $authors[rand(0, count($authors) - 1)];
            }

            $book->linkAuthors($authorNames);

            $categoryIds = [];
            $categoryCount = rand(1, 3);
            foreach (range(1, $authorCount) as $index) {
                $categoryIds[] = $categories[rand(0, count($categories) - 1)];
            }

            $book->linkCategories($categoryIds);
        }
    }
}
