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
use App\Category;

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

Route::get('/my-posts/show/{post}','PostController@show');
Route::get('/my-posts/edit/{post}','PostController@edit');
Route::patch('/post/{post}','PostController@update');
Route::delete('/post/{post}','PostController@destroy');

Route::get('/category/{category}', 'CategoryController@allPosts');

View::composer(['*'], function($view){
    $categories = Category::all();
    $view->with('categories', $categories);

    // $post = Post::where('user_id', $user_id);
    // $posts = Post::with('users')->get();
    // dd($posts);

    // $user = User::all(); 
    // $posts = Post::all();
    // $view->with('user',$user);
    // $view->with('posts',$posts);
});