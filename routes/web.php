<?php

use Illuminate\Support\Facades;
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

    return view('EmployeePage');

});

Route::get('/reports', function(){
    return view('reports');
});

Route::get('/search/', function(){
    $employees = \App\Employee::all();
    return $employees;
});

Route::get('/manager', function (){
    return view('ManagerPage');
});



Route::post('/get-employees-async', "EmployeeController@indexAsync")->name('get-eemployees-async');

Route::get('/employees-async', "EmployeeController@indexAsync")->name('employees-async');

Route::get('/employees', 'EmployeeController@index')->name('employees.all');
Route::get('/employees/{employee}', 'EmployeeController@show')->name('employees.show');
Route::get('/employee/new', 'EmployeeController@create')->name('employees.new');
Route::get('/employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
Route::post('/employees', 'EmployeeController@store')->name('employees.store');
Route::patch('/employees/{employee}', 'EmployeeController@update')->name('employees.update');
Route::delete('/employees/{employee}', 'EmployeeController@destroy')->name('employees.destroy');


Route::get('/shifts', 'ShiftController@index')->name('shifts.all');
Route::get('/shifts/{shift}', 'ShiftController@show')->name('shifts.show');
Route::get('/shift/new', 'ShiftController@create')->name('shifts.new');
Route::get('/shifts/{shift}/edit', 'ShiftController@edit')->name('shifts.edit');
Route::post('/shifts', 'ShiftController@store')->name('shifts.store');
Route::patch('/shifts/{shift}', 'ShiftController@update')->name('shifts.update');
Route::delete('/shifts/{shift}', 'ShiftController@destroy')->name('shifts.destroy');

Route::get('/products', 'ProductController@index')->name('products.all');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');
Route::get('/product/new', 'ProductController@create')->name('products.new');
Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::patch('products/{product}', 'ProductController@update')->name('products.update');
Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
