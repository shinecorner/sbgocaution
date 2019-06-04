<?php

use Faker\Generator as Faker;

$factory->define(App\Garant::class, function (Faker $faker) {
    return [
        "policy_id" => 0,
        "last_name" => $faker->lastName,
        "first_name" => $faker->firstName,
        "address" => $faker->streetAddress,
        "zip" => $faker->numberBetween($min = 1000, $max = 9000),
        "city" => $faker->city,
        "birthdate" => $faker->date($format = 'd.m.Y', $max = 'now')
    ];
});
