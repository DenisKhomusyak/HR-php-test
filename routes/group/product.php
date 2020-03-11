<?php

Route::name('product.')->prefix('product')->group(static function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::post('update-price', 'ProductController@updatePrice')->name('update.price')->middleware('ajax');
});