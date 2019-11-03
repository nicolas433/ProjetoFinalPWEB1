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

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/new', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/edit/{id}', 'CategoryController@edit');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/delete/{id}', 'CategoryController@destroy');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/new', 'ProductController@create');
Route::post('/products', 'ProductController@store');
Route::get('/products/edit/{id}', 'ProductController@edit');
Route::put('/products/{id}', 'ProductController@update');
Route::delete('/products/delete/{id}', 'ProductController@destroy');

Route::get('/history', 'HistoryController@index')->name('history');

Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/statistics', 'StatisticController@index')->name('statistics');



