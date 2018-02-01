<?php

use Librory\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Comedy',
            'Drama',
            'Horror fiction',
            'Literary realism',
            'Romance',
            'Satire',
            'Tragedy',
            'Tragicomedy',
            'Fantasy',
            'Mythology',
            'Adventure',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
