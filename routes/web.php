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
Route::get('/profile', 'AccountController@profile')->name('profile');
Route::patch('/profile', 'AccountController@updateProfile')->name('update-profile');
Route::get('/change-password', 'AccountController@changePassword')->name('change-password');
Route::patch('/change-password', 'AccountController@updatePassword')->name('update-password');
