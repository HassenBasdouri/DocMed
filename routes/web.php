<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/editprofile', 'ProfileController@edit')->name('editprofile');
Route::get('/patients','PatientController@index')->name('patients');
Route::get('/rencontres/{id}','RencontreController@list')->name('rencontres');
Route::post('/patients/search','PatientController@search')->name('patient_search');
Route::post('upload_image', 'ProfileController@store_image')->name('upload_image');
