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
Route::get('patient/{id}/images','PatientController@show_images')->name('show_images');
Route::get('patient/{id}/documents','PatientController@show_documents')->name('show_documents');
Route::post('/images/store','ImageController@store_image')->name('store_image');
Route::get('images/create','ImageController@create')->name('images.create');
Route::post('/documents/s/store','DocumentController@store')->name('store_doc');
Route::get('documents/create','DocumentController@create')->name('documents.create');