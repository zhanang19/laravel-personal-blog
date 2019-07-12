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

Route::get('/', 'FrontpageController@index')->name('homepage');
Route::get('post/{slug}', 'FrontpageController@view')->name('view-post');
Route::post('add-comment/{slug}', 'FrontpageController@addComment')->name('add-comment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'AccountController@profile')->name('profile');
Route::patch('/profile', 'AccountController@updateProfile')->name('update-profile');
Route::get('/change-password', 'AccountController@changePassword')->name('change-password');
Route::patch('/change-password', 'AccountController@updatePassword')->name('update-password');

Route::resource('posts', 'PostController');
Route::get('posts/delete/{slug}', 'PostController@destroy')->name('posts.delete');