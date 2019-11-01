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

Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

Route::get('/categories', 'CategoryController@index')->name('categories');

Route::get('/products', 'ProductController@index')->name('products');

Route::get('/history', 'HistoryController@index')->name('history');

Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/statistics', 'StatisticController@index')->name('statistics');



