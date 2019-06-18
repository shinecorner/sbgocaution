<?php

use Faker\Generator as Faker;

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
$factory->define(App\User::class, function (Faker $faker) {
	static $emails = ['ib@gocaution.ch', 'sb@gocaution.ch', 'rk@gocaution.ch', 'ym@gocaution.ch', 'pg@gocaution.ch', 'sandeep.p@gocaution.ch', 'saiyedirshad777@gmail.com', 'sweta.m@gocaution.ch', 'sarita.s@gocaution.ch'];
    return [
        'name' => $faker->name,
        'email' => array_shift($emails),
        'password' => bcrypt('GoCrm@123'), // GoCrm@123
        'remember_token' => str_random(10),
    ];
});
