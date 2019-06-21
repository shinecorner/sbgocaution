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
        'real_contact_num' => $real_contact_num,
        'user_id' => $faker->randomElement([1,2,3,4,5,6,7,8]),
        'contact_num' => getUniqueNum($real_contact_num, 3),
        'contact_type' => $faker->randomElement([1,2]),
        'salutation' => $faker->randomElement(['mr', 'mrs', 'company']),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'language' => $faker->randomElement(['de', 'en', 'fr', 'it']),
        'email' => $email,
        'status' => $faker->randomElement(array_keys(getContactStatus())),
        'rc_policy' => $faker->randomElement(['Yes', 'No']),
        'lead_source' => $faker->randomElement(array_keys(getLeadSource())),
        'is_duplicate' => $duplicate
    ];
});
