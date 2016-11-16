<?php
Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

Route::any('(.*)', 'Controller@createCart');

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

Route::get('/sugestoes', [
    'as' => 'suggestions',
    'uses' => 'SuggestionController@index'
]);

Route::get('/sobre', [
    'as' => 'about',
    'uses' => 'AboutController@index'
]);
Route::auth();

Route::get('/home', 'HomeController@index');
