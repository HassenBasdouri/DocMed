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
/* Route::get('locale/{lang}', function($lang){
    App::setLocale($lang);
    Session::put('app_locale', $lang);
    return redirect()->back();
}); */
Route::get('login/{locale}', function ($locale) {
    App::setLocale($locale);
    return redirect()->back();

    //
});
