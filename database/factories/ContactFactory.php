<?php

use Faker\Generator as Faker;
use App\Contact;

$factory->define(Contact::class, function (Faker $faker) {
	
	static $number = 1;
    $real_contact_num = $number++;
    return [
        'date' => now(),
        'real_contact_num' => $real_contact_num,
        'user_id' => 0,
        'contact_num' => getUniqueNum($real_contact_num, 3),
        'salutation' => $faker->randomElement(['mr', 'mrs', 'company']),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'language' => $faker->randomElement(['de-DE', 'fr-FR', 'it-IT']),
        'email' => $faker->email,
        'status' => $faker->randomElement(['new', 'offer', 'pre_confirmation_pending', 'pre_confirmation_sent', 'rejected', 'status_quote_waiting']),
        'rc_quote' => $faker->randomElement(['Yes', 'No'])
    ];
});
