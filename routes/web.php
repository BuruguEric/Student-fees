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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('index');
Route::get('/Students' , 'StudentsController@allStudents')->name('students');
Route::post('/Added' , 'StudentsController@store')->name('addstudent');
Route::get('/Fees' , 'FeesController@fee_results')->name('fees');
Route::post('/Paid' , 'FeesController@store')->name('payFees');
