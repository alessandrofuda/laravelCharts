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


Route::get('stocks', 'StockController@index');

Route::prefix('stock')->group(function() {

	Route::get('add', 'StockController@create');
	Route::post('add', 'StockController@store');
	// ajax call from stocks chart page
	Route::get('chart', 'StockController@chart');

});






