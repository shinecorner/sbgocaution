<?php

use Faker\Generator as Faker;
use App\Broker;

$factory->define(Broker::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->streetAddress,
        'zip' => $faker->numberBetween($min = 1000, $max = 9000),
        'city' => $faker->city,
        'email' => $faker->email,
        'website' => $faker->domainName,
        'real_broker_num' => $faker->randomDigit,
        'broker_num' => $faker->randomDigit,
        'mobile' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber
    ];
});
