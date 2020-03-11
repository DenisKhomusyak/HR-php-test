<?php

Route::name('order.')->prefix('order')->group(static function () {
    Route::get('/', 'OrderController@index')->name('index');
});