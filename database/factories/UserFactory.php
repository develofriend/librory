<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Librory\Models\User::class, function (Faker $faker) {
    $firstName = $faker->firstName;
    return [
        'first_name' => $firstName,
        'last_name' => $faker->lastName,
        'contact_number' => $faker->tollFreePhoneNumber,
        'address' => $faker->streetAddress,
        'email' => strtolower($firstName) . '@' . $faker->safeEmailDomain,
        'password' => 'secret',
        'remember_token' => str_random(10),
    ];
});
