<?php

use Librory\Models\Publisher;
use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publishers = factory(Publisher::class, 10)->create();
    }
}
