<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name'=>$faker->name(),
        'lastname'=>$faker->lastName(),
        'cin'=> $faker->numerify('########'),
        'birth'=>$faker->date(),
        'phone'=>$faker->phoneNumber(),
        'profession'=>$faker->jobTitle(),
        'CNAM'=>$faker->numerify('CA#######'),
    ];
});
