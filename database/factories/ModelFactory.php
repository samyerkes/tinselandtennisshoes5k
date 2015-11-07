<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Registration::class, function (Faker\Generator $faker) {
    return [
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber,
        'dob' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-5 years'),
        'street' => $faker->streetAddress,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'initials' => 'xx',
        'registration_fee' => 15.00,
        'emergency_fname' => $faker->firstName,
        'emergency_lname' => $faker->lastName, 
        'emergency_relationship' => 'Mother',
        'emergency_telephone' => $faker->phoneNumber,
    ];
});