<?php

use Faker\Generator as Faker;
use App\Contact;

$factory->define(Contact::class, function (Faker $faker) {
	static $number = 1;
    static $email = 'maier.andrej@t-online.de';
    $real_contact_num = $number++;
    if($number%10 != 0){
        $email = $faker->email;
        $duplicate = 0;
    }else{
        $duplicate = 1;
    }
    return [
        'date' => now(),
        'real_contact_num' => $real_contact_num,
        'user_id' => $faker->randomElement([1,2,3,4,5,6]),
        'contact_num' => getUniqueNum($real_contact_num, 3),
        'salutation' => $faker->randomElement(['mr', 'mrs', 'company']),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'language' => $faker->randomElement(['de-DE', 'fr-FR', 'it-IT', 'en-EN']),
        'email' => $email,
        'status' => $faker->randomElement(['new', 'offer', 'pre_confirmation_pending', 'pre_confirmation_sent', 'rejected', 'status_quote_waiting']),
        'rc_quote' => $faker->randomElement(['Yes', 'No']),
        'lead_source' => $faker->randomElement(array_keys(getLeadSource())),
        'is_duplicate' => $duplicate
    ];
});
