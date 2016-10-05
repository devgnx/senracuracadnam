<?php

Route::group([
    'as' => 'admin::',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function() {
    Route::get('login', [
        'as' => 'login',
        'uses' => 'AuthController@login'
    ]);

    Route::post('login', [
        'as' => 'auth',
        'uses' => 'AuthController@auth'
    ]);

    Route::get('logout', [
        'as' => 'logout',
        'uses' => 'AuthController@logout'
    ]);

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', [
            'as' => 'home',
            'uses' => 'AboutController@edit'
        ]);

        Route::get('sobre', [
            'as' => 'about:edit',
            'uses' => 'AboutController@edit'
        ]);

        Route::post('sobre', [
            'as' => 'about:save',
            'uses' => 'AboutController@save'
        ]);

        Route::get('servico/novo', [
            'as' => 'service:create',
            'uses' => 'AboutController@editService'
        ]);

        Route::get('servico/{id}', [
            'as' => 'service:edit',
            'uses' => 'AboutController@editService'
        ]);

        Route::post('servico/salvar/{id?}', [
            'as' => 'service:save',
            'uses' => 'AboutController@saveService'
        ]);
        Route::get('servico/remover/{id}', [
            'as' => 'service:delete',
            'uses' => 'AboutController@deleteService'
        ]);

        Route::get('pedidos', [
            'as' => 'order:list',
            'uses' => '\App\Http\Controllers\Order\OrderController@index'
        ]);

        Route::get('pedido/{id}', [
            'as' => 'order:view',
            'uses' => '\App\Http\Controllers\Order\OrderController@view'
        ]);

        Route::get('produtos', [
            'as' => 'product:list',
            'uses' => 'ProductController@index'
        ]);

        Route::get('produto/novo', [
            'as' => 'product:create',
            'uses' => 'ProductController@create'
        ]);

        Route::get('produto/{id}', [
            'as' => 'product:edit',
            'uses' => 'ProductController@edit'
        ]);

        Route::post('produto/salvar/{id?}', [
            'as' => 'product:save',
            'uses' => 'ProductController@save'
        ]);

        Route::get('produto/remover/{id}', [
            'as' => 'product:delete',
            'uses' => 'ProductController@delete'
        ]);

        Route::post('categoria/salvar/{id?}', [
            'as' => 'category:save',
            'uses' => 'CategoryController@save'
        ]);

        Route::get('contato', [
            'as' => 'contact:edit',
            'uses' => 'ContactController@edit'
        ]);

        Route::post('contato', [
            'as' => 'contact:save',
            'uses' => 'ContactController@save'
        ]);
    });
});
