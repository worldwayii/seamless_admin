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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/result', 'HomeController@result');

Route::get('companies', 'CompanyController@index');
/* this route for Company */ 
Route::group(['prefix' => 'company'], function () { 
	Route::get('create', 'CompanyController@create');
	Route::post('store', 'CompanyController@store');
	Route::get('edit/{id}', 'CompanyController@edit');
	Route::post('update/{id}', 'CompanyController@update');
	Route::delete('destroy/{id}', 'CompanyController@destroy');
});

Route::resource('employees', 'EmployeeController');
/* this route for Employee */ 
Route::group(['prefix' => 'employee'], function () { 
	Route::get('create', 'EmployeeController@create');
	Route::post('store', 'EmployeeController@store');
	Route::get('edit/{id}', 'EmployeeController@edit');
	Route::post('update/{id}', 'EmployeeController@update');
	Route::delete('destroy/{id}', 'EmployeeController@destroy');
});

