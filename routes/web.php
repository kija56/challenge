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
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('lang/{locale}', 'HomeController@lang');

Route::resource('companies', 'CompanyController');
Route::post('employees/import', 'EmployeeController@import')->name('import');
Route::get('employees/email', 'EmployeeController@email')->name('email');
Route::post('employees/sendMail', 'EmployeeController@sendMail');
Route::resource('employees', 'EmployeeController');

