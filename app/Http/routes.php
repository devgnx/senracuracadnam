<?php

require "Routes/admin.php";

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/produto/{id}', [
    'as' => 'product.index',
    'uses' => 'ProductController@index'
]);

Route::get('/produtos/{id}', [
    'as' => 'product.index',
    'uses' => 'ProductsController@index'
]);*/
