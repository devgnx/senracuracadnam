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
    'prefix' => 'carrinho',
    'namespace' => 'Order'
], function() {
    Route::get('/lista', [
        'as' => 'cart.list',
        'uses' => 'CartController@index'
    ]);

    Route::get('/formulario', [
        'as' => 'cart.form',
        'uses' => 'CartController@getAddForm'
    ]);

    Route::post('/adicionar', [
        'as' => 'cart.add',
        'uses' => 'CartController@add'
    ]);

    Route::get('/remover/{id}', [
        'as' => 'cart.remove',
        'uses' => 'CartController@remove'
    ]);

    Route::get('/ver-quantidade-itens', [
        'as' => 'cart.count',
        'uses' => 'CartController@count'
    ]);

    Route::post('/enviar-pedido', [
        'as' => 'order.save',
        'uses' => 'OrderController@save'
    ]);
});
