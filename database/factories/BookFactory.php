<?php

use Faker\Generator as Faker;

$factory->define(Librory\Models\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(rand(3, 7)),
        'isbn' => $faker->isbn13
    ];
});
