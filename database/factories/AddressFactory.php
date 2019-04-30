<?php

use Faker\Generator as Faker;
use App\Address;

$factory->define(Address::class, function (Faker $faker) {
    return [
    	'is_primary' => 1,
    	'type' => $faker->boolean(),
        'co_address_name' => '',
        'address' => $faker->streetAddress,
        'plz' => $faker->numberBetween($min = 1000, $max = 9000),
        'state' => strtoupper($faker->word(2)),
        'ort' => $faker->city,
        'comment' => '',
        'ordering' => $faker->numberBetween($min = 1, $max = 5),
        'from_partner' => 0,
        'old_cn' => '',
        'not_correct' => $faker->boolean()
    ];
});
