<?php

use Faker\Generator as Faker;
use App\Contact;

$factory->define(Contact::class, function (Faker $faker) {
	
	static $number = 1;

    return [
        'date' => now(),
        'real_contact_num' => $faker->randomNumber(3),
        'user_id' => $faker->numberBetween(1, 10),
        'nachname' => $faker->firstName,
        'vorname' => $faker->lastName,
        'address' => $faker->address,
        'contact_formate' => getUniqueNum($number++, 3) 
    ];
});
