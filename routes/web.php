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
Route::get('/addresses', 'AddressController@index');
Route::get(   '/addresses/new',    'AddressController@create');
Route::post(  '/addresses',             'AddressController@store');
Route::get(   '/addresses/edit/{id}',        'AddressController@edit');
Route::put(   '/addresses/{id}',        'AddressController@update');
Route::delete('/addresses/delete/{id}', 'AddressController@destroy');

Route::get('/selectaddress', 'SelectAddressController@index');
Route::get('/selectaddress/{action}', 'AddressController@create');

Route::get('/shoppingbag', 'ShoppingBagController@index')->name('shoppingbag');
Route::post('/shoppingbag', 'ShoppingBagController@store');
Route::delete('/shoppingbag/{id}', 'ShoppingBagController@destroy');

Route::get('/history', 'HistoryController@index')->name('history');




Route::get('/clients/{status}', 'ClientController@index')->name('clients');
Route::delete('/clients/delete/{id}', 'ClientController@destroy');





Route::get('/statistics', 'StatisticController@index')->name('statistics');

Route::get('/menu/categories', 'MenuController@indexCategories');
Route::get('/menu/{id}/products', 'MenuController@showProductsByCategory');
Route::get('/menu/item/{id}', 'MenuController@show');

// Rotas Request
Route::post('/summary', 'SolicitationController@orderSummary');
Route::post('/request', 'SolicitationController@store');

// Histórico de pedidos e acompanhar pedido
Route::get('/requests', 'SolicitationController@index'); // Listar todos os pedidos para o cliente
Route::get('/requests/request/{id}', 'SolicitationController@show'); // Exibir detalhes de um pedido
Route::get('/requests/request/cancel/{id}', 'SolicitationController@cancel');


