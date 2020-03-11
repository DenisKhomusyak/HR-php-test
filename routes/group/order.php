<?php

Route::name('order.')->prefix('order')->group(static function () {
    Route::get('/', 'OrderController@index')->name('index');
    Route::get('{id}', 'OrderController@edit')->name('edit');
    Route::put('{id}', 'OrderController@update')->name('update');
});