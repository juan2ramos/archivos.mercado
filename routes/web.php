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

use App\Events\UserWasCreated;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('home', 'Admin\HomeController@toValidate')->name('toValidate');

Route::get('cerrar-sesion', 'Auth\LoginController@logout')->name('logout');

Route::get('event', function () {

    return new \App\Mail\UserRegister(\App\User::find(1));
});
