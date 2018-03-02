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
    return view('demo');
});



Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/{employee}', 'EmployeeController@show');
Route::get('/employee/new', 'EmployeeController@create')->name('makeEmp');
Route::get('/employees/{employee}/edit', 'EmployeeController@edit');
Route::post('/employees', 'EmployeeController@store');
Route::patch('/employees/{employee}', 'EmployeeController@update');
Route::delete('/employees/{employee}', 'EmployeeController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
