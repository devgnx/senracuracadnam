<?php

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
