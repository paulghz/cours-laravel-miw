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

Route::get('/', 'PagesController@home')->name('home');

Route::get('/hello/{name}', 'PagesController@hello')->name('hello');


Route::get('/series', 'SeriesController@index')->name('series_index');
Route::get('/serie/{serie_id}', 'SeriesController@serie')->name('serie');


Route::get('/users', 'UsersController@index')->name('users_index');
