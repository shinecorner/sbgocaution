<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'date' => now(),
        'real_contact_num' => $faker->randomNumber(3),
        'id' => $faker->unique()->randomNumber(3),
        'user_id' => $faker->numberBetween(1, 10),
        'nachname' => $faker->firstName,
        'vorname' => $faker->lastName,
        'address' => $faker->address
    ];
});
