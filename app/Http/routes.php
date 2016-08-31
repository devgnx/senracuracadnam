<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/{id}', [
    'as' => 'product.index',
    'uses' => 'ProductController@index'
]);

Route::get('/produtos/{id}', [
    'as' => 'product.index',
    'uses' => 'ProductsController@index'
]);

Route::group(['prefix' => 'admin'], function() {
    Route::post('/produtos/salvar', [
        'as' => 'products.save',
        'uses' => 'ProductsController@save'
    ]);
});
