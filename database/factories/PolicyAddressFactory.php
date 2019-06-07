<?php

use Faker\Generator as Faker;
use App\PolicyAddress;

$factory->define(PolicyAddress::class, function (Faker $faker) {
    return [
    	'policy_id' => 0,
        'address' => $faker->streetAddress,
        'zip' => $faker->numberBetween($min = 9000, $max = 9999),
        'state' => strtoupper($faker->word(2)),
        'city' => $faker->city,
        'rent_beginn' => '',
        'rent' => '',
        'deposit_amount' => $faker->randomNumber(5),
    ];
});
