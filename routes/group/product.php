<?php

Route::name('product.')->prefix('product')->group(static function () {
    Route::get('/', 'ProductController@index')->name('index');
});