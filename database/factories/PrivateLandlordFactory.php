<?php

use Faker\Generator as Faker;
use App\PrivateLandlord;

$factory->define(PrivateLandlord::class, function (Faker $faker) {
    return [
        'real_privatelandlord_num' => $faker->randomDigit,
        'privatelandlord_num' => $faker->randomDigit,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'user_id' => $faker->randomElement([1,2,3,4,5,6,7,8]),
        'is_duplicate' => $faker->boolean,
        'number' => $faker->randomDigit,
        'salutation' => $faker->randomElement(['mr', 'mrs', 'company']),
        'language' => $faker->randomElement(['de', 'en', 'fr', 'it']),
        'address' => $faker->streetAddress,
        'zip' => $faker->numberBetween($min = 1000, $max = 9000),
        'city' => $faker->city,
        'state' => strtoupper($faker->word(2)),
        'country' => $faker->countryCode,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => $faker->domainName,
        'notes' => $faker->text,
        'fax' => $faker->postcode,
        'policy_comment_notification' => $faker->boolean,
        'damage_comment_notification' => $faker->boolean,
        'certificate_email' => $faker->boolean,
        'payment_recipient_bank' => $faker->bank,
        'payment_recipient_iban' => $faker->iban,
        'payment_recipient_post_account' => $faker->bankAccountNumber,
        'file_names' => $faker->text(5),
    ];
});
