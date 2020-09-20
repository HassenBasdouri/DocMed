<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;
use App\Patient;
use App\User;

$factory->define(Image::class, function (Faker $faker) {
    $patients=Patient::all()->pluck('id')->toArray();
    $users=User::all()->pluck('id')->toArray();
    return [
        //
        'patient_id'=>$faker->randomElement($patients),
        'user_id'=>$faker->randomElement($users),
        'description'=>$faker->paragraph(),
        'path'=>$faker->image($dir = public_path('storage/images/img'), $width = 640, $height = 480,$category='abstract', $fullPath=false),
    ];
});
