<?php

use Illuminate\Support\Facades;

//Admin and User Routes
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@index');

    //MVC Routes
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

    Route::post('/orders', 'OrderController@store');
    Route::get('/orders', 'OrderController@index');
    Route::get('/orders/show/all', 'OrderController@showAll');
    Route::get('/orders/data', 'OrderController@indexAjax');
    Route::delete('/orders/{order}', 'OrderController@destroy');

    //Page Routes
    Route::get('/', function () {
        return view('EmployeePage');
    });
    Route::get('/manager', function () {
        return view('ManagerPage');
    });

    Route::get('/timeclock', function () {
        return view('timeclock');
    });

    Route::get('/pos', function () {
        return view('/pos');
    });

//Search Ajax Routes
    Route::get('/search/product/{upc}', 'SearchController@getProductByUpc');

//TimeClock Ajax Routes
    Route::get('/timeclock/check/{id}', 'TimeClockController@CheckStatus');
    Route::post('/timeclock/break/start/', 'TimeClockController@StartBreak');
    Route::post('/timeclock/break/end/', 'TimeClockController@EndBreak');
    Route::post('/timeclock/clockout/', 'TimeClockController@ClockOut');
});




