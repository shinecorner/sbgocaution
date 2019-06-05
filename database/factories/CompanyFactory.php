<?php

use Faker\Generator as Faker;

$factory->define(App\ContactCompany::class, function (Faker $faker) {
    return [
        'contact_id' => 0,
        'type' => $faker->randomElement(array_keys(getCompanyTypes())),
        'branch' => $faker->randomElement(array_keys(getCompanyBranches())),
        'name' => $faker->name,
        'zip' => $faker->numberBetween($min = 1000, $max = 9000),
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'mail' => $faker->email
    ];
});
