<?php

require "Routes/admin.php";
require "Routes/cart.php";

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

Route::get('/contato/enviar', [
    'as' => 'contact.send',
    'uses' => 'ContactController@sendMail'
]);
