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

Route::get('/produtos', [
    'as' => 'product.categories',
    'uses' => 'ProductController@categories'
]);

Route::get('/produtos/{id}', [
    'as' => 'product.list',
    'uses' => 'ProductController@category'
]);

Route::get('/contato', [
    'as' => 'contact',
    'uses' => 'ContactController@index'
]);
