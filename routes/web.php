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

Route::get('weather', 'Weather\WeatherController@get');

Route::namespace('Order')->group(__DIR__ . '/group/order.php');
Route::namespace('Product')->group(__DIR__ . '/group/product.php');

