<?php

use Faker\Generator as Faker;

$factory->define(Librory\Models\Publisher::class, function (Faker $faker) {
    $name = $faker->company;

    return [
        'name' => $name,
        'address' => $faker->address,
        'email' => str_slug(strtolower($name)) . '@' . $faker->safeEmailDomain,
        'contact_number' => $faker->tollFreePhoneNumber
    ];
});
