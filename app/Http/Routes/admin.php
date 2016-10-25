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
            'uses' => 'AboutController@form'
        ]);

        Route::get('banners', [
            'as' => 'banner:list',
            'uses' => 'BannerController@index'
        ]);

        Route::get('banner/novo', [
            'as' => 'banner:create',
            'uses' => 'BannerController@form'
        ]);

        Route::get('banner/{id}', [
            'as' => 'banner:edit',
            'uses' => 'BannerController@form'
        ]);

        Route::post('banner/salvar/{id?}', [
            'as' => 'banner:save',
            'uses' => 'BannerController@save'
        ]);

        Route::get('banner/remover/{id}', [
            'as' => 'banner:delete',
            'uses' => 'BannerController@delete'
        ]);

        Route::get('sobre', [
            'as' => 'about:edit',
            'uses' => 'AboutController@form'
        ]);

        Route::post('sobre', [
            'as' => 'about:save',
            'uses' => 'AboutController@save'
        ]);

        Route::get('servico/novo', [
            'as' => 'service:create',
            'uses' => 'AboutController@formService'
        ]);

        Route::get('servico/{id}', [
            'as' => 'service:edit',
            'uses' => 'AboutController@formService'
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

        Route::post('pedido/{id}/mudar-status/', [
            'as' => 'order:save-status',
            'uses' => '\App\Http\Controllers\Order\OrderController@saveStatus'
        ]);

        Route::get('produtos', [
            'as' => 'product:list',
            'uses' => 'ProductController@index'
        ]);

        Route::get('produto/novo', [
            'as' => 'product:create',
            'uses' => 'ProductController@form'
        ]);

        Route::get('produto/{id}', [
            'as' => 'product:edit',
            'uses' => 'ProductController@form'
        ]);

        Route::post('produto/salvar/{id?}', [
            'as' => 'product:save',
            'uses' => 'ProductController@save'
        ]);

        Route::get('produto/remover/{id}', [
            'as' => 'product:delete',
            'uses' => 'ProductController@delete'
        ]);

        Route::get('categorias', [
            'as' => 'category:list',
            'uses' => 'CategoryController@index'
        ]);

        Route::get('categorias/input-options', [
            'as' => 'category:options',
            'uses' => 'CategoryController@options'
        ]);

        Route::post('categoria/salvar/{id?}', [
            'as' => 'category:save',
            'uses' => 'CategoryController@save'
        ]);

        Route::get('contato', [
            'as' => 'contact:edit',
            'uses' => 'ContactController@form'
        ]);

        Route::post('contato', [
            'as' => 'contact:save',
            'uses' => 'ContactController@save'
        ]);
    });
});
