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

Route::get('student','StudentController@students');

Route::get('student_find',function(){
	$student = App\Student::where("name","=","gregg")->first();
	echo $student->name." ".$student->id."<br />";
});

Route::get('subject',function(){
	$subjects = App\Subject::all();

	foreach($subjects as $subject){
		// $student = App\Student::find($subject->student_id);
		echo "<li>".$subject->name." belongs to ".$subject->student->name."</li>";
	}
});

Route::get('student_search/{id}',function($id){
	$students = App\Student::find($id);
	echo "$students->name";
	foreach($students->subjects as $subject){
		echo "<li>".$subject->name."</li>";
	}
});

Route::get('mypage',function(){
	$data = array(
		'var1'=>'gregg',
		'var2'=>'marionn',
		'var3'=>'icay',
		'subjects'=>App\Subject::all()
		);
	return view('mypage',$data);
});

Route::get('hello/{id}',function($id){
	echo "ID is ".$id;
});

Route::post('test',function(){
	echo "We have created something";
});

Route::get('test',function(){
	echo "<form action='test' method='post'>";
		echo "<input type='submit' />";
		echo "<input type='hidden' value='".csrf_token()."' name='_token' />";
		echo "<input type='hidden' value='PUT' name='_method' />";
	echo "</form>";
});

Route::put('test',function(){
	echo "We have updated something";
});

Route::delete('test', function(){
	echo "We have deleted something";
});