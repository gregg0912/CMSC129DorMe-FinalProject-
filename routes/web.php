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
Route::get('/user/settings', 'ProfileController@settings');

Route::put('/user/settings/{id}', 'ProfileController@update');

Route::get('/profile/{username}', 'ProfileController@profile');

Route::get('/posts/like/{post_id}', 'PostsController@likePost');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/posts', 'PostsController');

// Route::get('/follows/{user_id}', 'UserController@follows');

