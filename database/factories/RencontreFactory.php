<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rencontre;
use Faker\Generator as Faker;
use App\Patient;
use App\User;

$factory->define(Rencontre::class, function (Faker $faker) {
    $patients=Patient::all()->pluck('id')->toArray();
    $users=User::all()->pluck('id')->toArray();
    return [
        //
        'patient_id'=>$faker->randomElement($patients),
        'user_id'=>$faker->randomElement($users),
        'date'=>$faker->dateTimeBetween('-5 years'),
        'type_contact'=>random_int(1,10),
        'donnees_significatives'=>$faker->paragraph(),
        'conclusion'=>$faker->paragraph(),
        'decisions'=>$faker->paragraph(),
    ];
});
