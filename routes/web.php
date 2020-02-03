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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile/{user}', 'ProfilesController@index')->name('profiles.show');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profiles.update');
Route::delete('/profile/{user}', 'ProfilesController@destroy')->name('profiles.destroy');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');

// Posts Routes
Route::post('/p', 'PostsController@store')->name('posts.store');
Route::get('/p/create', 'PostsController@create')->name('posts.create');
Route::get('/p/{post}', 'PostsController@show')->name('posts.show');
