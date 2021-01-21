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

Route::get('/serie/add', 'SeriesController@add')->name('serie_add');
Route::post('/serie/add', 'SeriesController@postAdd')->name('serie_add_post');

Route::get('/serie/{serie_id}', 'SeriesController@serie')->name('serie');



Route::get('/users', 'UsersController@index')->name('users_index');

Route::get('/user/delete', 'UsersController@delete')->name('user_delete');
Route::get('/user/restore', 'UsersController@restore')->name('user_restore');

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::get('/home', 'HomeController@index')->name('home');
