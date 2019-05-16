<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\RealestateAgency::class, function (Faker $faker) {
  $users = User::all()->pluck('id')->toArray();
    return [
       'real_contact_num' => $faker->randomDigit ,
       'user_id' => $faker-> randomElement($users) ,
       'is_duplicate' => $faker->boolean ,
       'contact_num' => $faker->phoneNumber ,
       'number' => $faker->randomElement(['ORG-001', 'ORG-002','ORG-003']),
       'name' => $faker->name ,
       'address' => $faker->address ,
       'zipcode' => $faker->postcode ,
       'city' => $faker->city ,
       'lattitude' => $faker->latitude() ,
       'longitude' => $faker->latitude() ,
       'state' => $faker->state ,
       'stateold' => '' ,
       'country' => $faker->countryCode ,
       'phone' => $faker->PhoneNumber ,
       'phone2' => $faker->PhoneNumber ,
       'fax' => $faker->postcode ,
       'email' => $faker->email ,
       'website' => $faker->url ,
       'language' => $faker->languageCode ,
       'region' => $faker->randomDigit ,
       'inter1' => '' ,
       'inter2' => '',
       'inter3' => '' ,
       'contact_person_1' => $faker->name ,
       'contact_person_2' => $faker->name ,
       'contact_person_3' => $faker->name ,
       'crediweb_username_old' => $faker->name ,
       'crediweb_password_old' => bcrypt('123456') ,
       'status_vertrag' => '' ,
       'notes' => $faker->text ,
       'partner_username' => $faker->email ,
       'partner_password' => $faker->password ,
       'contact_person_1_anrede' => '' ,
       'contact_person_1_nachname' => '' ,
       'contact_person_1_vorname' => '' ,
       'contact_person_2_nachname' => '' ,
       'contact_person_2_vorname' => '' ,
       'contact_person_3_nachname' => '' ,
       'contact_person_3_vorname' => '' ,
       'contact_person_2_anrede' => '' ,
       'contact_person_3_anrede' => '' ,
       'contact_person_1_position' => $faker->jobTitle ,
       'contact_person_2_position' => $faker->jobTitle ,
       'contact_person_3_position' => $faker->jobTitle ,
       'old_notes' => $faker->text ,
       'key_account_manager' => $faker->randomDigit ,
       'quote_comment_notification' => $faker->boolean ,
       'damage_comment_notification' => $faker->boolean ,
       'certificate_email' => $faker->boolean ,
       'payment_recipient_bank' => $faker->bank ,
       'payment_recipient_iban' => $faker->iban ,
       'payment_recipient_post_account' => '' ,
       'child_organizations' => '' ,
       'scan_file_name' => '' ,
       'mass_email_sent' => $faker->boolean ,
       'mass_email_sent_time' => $faker->dateTime() ,
       'newquote_email_notification' => $faker->boolean ,
       'hoacception' => $faker->boolean
    ];
});
