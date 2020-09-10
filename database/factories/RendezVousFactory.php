<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patient;
use App\RendezVous;
use App\User;
use Faker\Generator as Faker;

$factory->define(RendezVous::class, function (Faker $faker) {
    $patients=Patient::all()->pluck('id')->toArray();
    $users=User::all()->pluck('id')->toArray();
    return [
        //
        'patient_id'=>$faker->randomElement($patients),
        'user_id'=>$faker->randomElement($users),
        'date'=>$faker->dateTimeBetween('now','+15 days')->format('Y-m-d'),
        'time'=>$faker->time($format = 'H:i')
    ];
});
