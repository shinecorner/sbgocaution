<?php

use Faker\Generator as Faker;
use App\Contact;

$factory->define(Contact::class, function (Faker $faker) {
	
	static $number = 1;
    $real_contact_num = $number++;
    return [
        'date' => now(),
        'real_contact_num' => $real_contact_num,
        'user_id' => $faker->numberBetween(1, 10),
        'contact_formate' => getUniqueNum($real_contact_num, 3),
        'salutation' => $faker->randomElement(['mr', 'mrs', 'company']),
        'name' => $faker->name,
        'firstname' => $faker->firstName,
        'language' => $faker->randomElement(['de-DE', 'fr-FR', 'it-IT']),
        'email' => $faker->email,
        'status' => $faker->randomElement(['new', 'offer', 'pre_confirmation_pending', 'pre_confirmation_sent', 'rejected', 'status_quote_waiting']),
        'rc_quote' => $faker->randomElement(['Yes', 'No'])
    ];
});
