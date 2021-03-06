<?php

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

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/loadState/{countryID}', 'Auth\RegisterController@loadStateValue')->name('state');
Route::get('/loadCity/{stateID}', 'Auth\RegisterController@loadCityValue')->name('city');

Route::resource('/profile', 'ProfileController')->only([
     'show'
]);

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');
