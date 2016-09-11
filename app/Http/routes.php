<?php

require "Routes/admin.php";

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);


Route::get('/produto/{id}', [
    'as' => 'product.index',
    'uses' => 'ProductController@index'
]);

Route::get('/produtos/{id}', [
    'as' => 'product.list',
    'uses' => 'ProductController@list'
]);
