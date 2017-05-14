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

});

Route::get('/about', function(){
	return view('about');
});

Route::resource('/view', 'DormController');

Route::resource('/vote', 'DormController');

Route::resource('/dorm', 'DormController');

Route::get('/view', 'DormController@index');

Route::get('/vote', 'DormController@voteIndex');
<<<<<<< HEAD:routes/web.php

Route::get('/dorm/vote/{dorm_id}', 'DormController@vote');

=======
>>>>>>> 42e68c8b804e979d880d52ba26f2e5c99eaab258:129crashcourse/routes/web.php
