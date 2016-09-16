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

Route::group([
    'as' => 'cart.',
    'prefix' => 'carrinho',
    'namespace' => 'Cart'
], function() {
    Route::get('/lista', [
        'as' => 'list',
        'uses' => 'CartController@index'
    ]);

    Route::get('/formulario', [
        'as' => 'form',
        'uses' => 'CartController@getAddForm'
    ]);

    Route::post('/adicionar', [
        'as' => 'add',
        'uses' => 'CartController@add'
    ]);

    Route::get('/remover/{id}', [
        'as' => 'remove',
        'uses' => 'CartController@remove'
    ]);

    Route::get('/ver-quantidade-itens', [
        'as' => 'count',
        'uses' => 'CartController@count'
    ]);
});
