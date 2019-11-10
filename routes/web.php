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



Route::get('/test-p/{num1}/{num2}',function($num1,$num2){
	return $num1+$num2;
});

Route::get('/test-pd/{num1}/{num2?}',function($num1,$num2=3){
	return $num1+$num2;
});

Route::get('/test-pt/{num1}/{num2?}/{num3?}',function($num1,$num2=3,$num3=2){
	return $num1+$num2+$num3;
});

Route::get('/test-v/{num1}/{num2}',function($num1,$num2){
	return $num1+$num2;
})->where(['num1'=>'[0-9]+','num2'=>'[0-9]+']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::group(['middleware'=>'auth','prefix'=>'proceso'],function(){

	Route::resource('articles','ArticleController');

	Route::get('/test',function(){
		return "Hola Mundo";
	})->name('test')->middleware('password.confirm');
    

	Route::get('/horario',function(){
		return Carbon\Carbon::now();
	})->name('horario');

});
