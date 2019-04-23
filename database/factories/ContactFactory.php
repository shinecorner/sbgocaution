<?php

use Faker\Generator as Faker;
use App\Contact;

$factory->define(Contact::class, function (Faker $faker) {
	
	static $number = 1;

    return [
        'date' => now(),
        'real_contact_num' => $faker->randomNumber(3),
        'user_id' => $faker->numberBetween(1, 10),
        'anrede' => $faker->randomElement(['mr', 'mrs', 'company']),
        'nachname' => $faker->firstName,
        'vorname' => $faker->lastName,
        'language' => $faker->randomElement(['de-DE', 'fr-FR', 'it-IT']),
        'address' => $faker->address,
        'contact_formate' => getUniqueNum($number++, 3),
        'status' => $faker->randomElement(['new', 'offer', 'pre_confirmation_pending', 'pre_confirmation_sent', 'rejected', 'status_quote_waiting']),
        'rc_quote' => $faker->randomElement(['Yes', 'No'])
    ];
});
