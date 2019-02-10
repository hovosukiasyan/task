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

// Route::resource('/profile', 'UserController');

Route::get('/profile', 'UserController@index');
Route::patch('/profile', 'UserController@update');


Route::get('/post/create', 'PostController@create');
Route::post('/post/', 'PostController@store');

Route::get('/my-posts', 'PostController@myPosts');
Route::get('/all-posts', 'PostController@allPosts');
// Route::get('/profile','UserController@index');
// Route::patch('/profile/{user}','UserController@update');