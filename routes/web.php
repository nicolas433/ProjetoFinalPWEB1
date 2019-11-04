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

// Route::get('admin/routes', 'HomeController@admin')->middleware('admin');


//CAtEGOGIES
Route::get(   '/categories',             'CategoryController@index')->name('categories');
Route::get(   '/categories/new',         'CategoryController@create');
Route::post(  '/categories',             'CategoryController@store');
Route::get(   '/categories/edit/{id}',   'CategoryController@edit');
Route::put(   '/categories/{id}',        'CategoryController@update');
Route::delete('/categories/delete/{id}', 'CategoryController@destroy');

//PRODUCtS
Route::get(   '/products',             'ProductController@index')->name('products');
Route::get(   '/products/new',         'ProductController@create');
Route::post(  '/products',             'ProductController@store');
Route::get(   '/products/edit/{id}',   'ProductController@edit');
Route::put(   '/products/{id}',        'ProductController@update');
Route::delete('/products/delete/{id}', 'ProductController@destroy');

//ADDRESS
Route::get(   '/addresses/{id}/new',    'AddressController@create');
Route::post(  '/addresses',             'AddressController@store');
Route::get(   '/addresses/{id}',        'AddressController@show');
Route::put(   '/addresses/{id}',        'AddressController@update');
Route::delete('/addresses/delete/{id}', 'AddressController@destroy');



Route::get('/history', 'HistoryController@index')->name('history');

Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/statistics', 'StatisticController@index')->name('statistics');



