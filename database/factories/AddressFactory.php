<?php

use Faker\Generator as Faker;
use App\Address;

$factory->define(Address::class, function (Faker $faker) {
    return [
    	'is_primary' => 1,
    	'type' => 1,
        'co_name' => '',
        'address' => $faker->streetAddress,
        'zip' => $faker->numberBetween($min = 1000, $max = 9000),
        'state' => strtoupper($faker->word(2)),
        'city' => $faker->city,
        'comment' => '',
        'from_partner' => 0,
        'old_cn' => '',
        'not_correct' => $faker->boolean()
    ];
});
