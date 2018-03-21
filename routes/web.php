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


Route::get('/shifts', 'ShiftController@index');
Route::get('/shifts/{shift}', 'ShiftController@show');
Route::get('/shift/new', 'ShiftController@create');
Route::get('/shifts/{shift}/edit', 'ShiftController@edit');
Route::post('/shifts', 'ShiftController@store');
Route::patch('/shifts/{shift}', 'ShiftController@update');
Route::delete('/shifts/{shift}', 'ShiftController@destroy');

Route::get('/products', 'ProductController@index');
Route::get('/products/{product}', 'ProductController@show');
Route::get('/product/new', 'ProductController@create');
Route::get('/products/{product}/edit', 'ProductController@edit');
Route::post('/products', 'ProductController@store');
Route::patch('products/{product}', 'ProductController@update');
Route::delete('/products/{product}', 'ProductController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
