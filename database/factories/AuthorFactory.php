<?php

use Faker\Generator as Faker;

$factory->define(Librory\Models\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
