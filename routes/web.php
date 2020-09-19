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
Route::post('/test','RendezVousController@search')->name('rendezvous_search');
Route::get('/test','RendezVousController@search');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/editprofile', 'ProfileController@edit')->name('editprofile');
Route::get('/patients/{id}/rencontres','RencontreController@list')->name('patients.rencontres');
Route::post('/patients/search','PatientController@search')->name('patient_search');
Route::post('upload_image', 'ProfileController@store_image')->name('upload_image');
Route::post('change_name','ProfileController@change_name')->name('change_name');
Route::post('change_lastname','ProfileController@change_lastname')->name('change_lastname');
Route::post('change_password','ProfileController@change_password')->name('change_password');
Route::resource('patients', 'PatientController');
Route::resource('rencontres', 'RencontreController');
Route::resource('rendezvous', 'RendezVousController');
