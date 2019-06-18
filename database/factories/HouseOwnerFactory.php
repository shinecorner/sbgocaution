<?php

use Faker\Generator as Faker;
use App\HouseOwner;

$factory->define(HouseOwner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'realestate_agency_id' => 0,
        'address' => $faker->streetAddress,
        'zip' => $faker->numberBetween($min = 1000, $max = 9000),
        'city' => $faker->city,
        'status' => $faker->randomElement(['contacted, not_contacted']),
        'email' => $faker->email,
        'website' => $faker->domainName,
        'phone' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'payment_recipient_bank' => $faker->phoneNumber,
        'payment_recipient_iban' => $faker->phoneNumber,
        'payment_recipient_post_account' => $faker->phoneNumber,
        'is_duplicate' => $faker->boolean
    ];
});
