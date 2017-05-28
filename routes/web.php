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

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index');

	Route::get('/home/show', 'HomeController@showDorms');

	Route::get('/home/showDorms/{user_id}/{dorm_id}', 'HomeController@destroy');

	Route::post('/editThumbnail/{dorm_id}', 'ImageController@change');

	Route::post('/upload/{dorm_id}', 'ImageController@upload');

	Route::resource('/request', 'RequestDormController');

	Route::get('/request', 'RequestDormController@index');

	Route::get('/request/create', 'RequestDormController@create');
});

Route::get('/about', function(){
	return view('about');
});

Route::resource('/view', 'DormController');

Route::resource('/vote', 'DormController');

Route::resource('/dorm', 'DormController');

Route::get('/dorm/{dorm_id}', 'DormController@update');

Route::get('/view', 'DormController@index');

Route::get('/vote', 'DormController@voteIndex');

Route::get('/dorm/viewdorm/{dorm_id}', 'DormController@show');

Route::get('/voteDorm/{dorm_id}', 'DormController@vote');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/confirm/{dorm_id}', 'AdminController@confirm');

Route::get('/admin/reject/{dorm_id}', 'AdminController@reject');

Route::get('/owner/notifications', 'OwnerController@index');

Route::get('/dorm/viewdorm/comment/{comment_id}', 'DormController@delcom');

