<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameFemale,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'gender' => $faker->boolean,
        'date_of_birth' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
        'address' => $faker->address,
        'contact_number' => $faker->phoneNumber,
    ];
});
