<?php

use Librory\Models\Shelf;
use Illuminate\Database\Seeder;

class ShelvesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $index) {
            Shelf::create([
                'name' => 'Shelf ' . $index
            ]);
        }
    }
}
