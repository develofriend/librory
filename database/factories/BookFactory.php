<?php

use Faker\Generator as Faker;

$factory->define(Librory\Models\Book::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(3, 5)), '.'),
        'isbn' => $faker->isbn13
    ];
});
