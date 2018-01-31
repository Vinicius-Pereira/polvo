<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix'=>'produtos'], function (){

	Route::get('', ['as'=>'produtos', 'uses'=>'ProdutoController@index']);

	Route::get('create', ['as'=>'produtos.create', 'uses'=>'ProdutoController@create']);

	Route::get('{id}', ['as'=>'produtos.info', 'uses'=>'ProdutoController@info']);

	Route::post('store', ['as'=>'produtos.store', 'uses'=>'ProdutoController@store']);

	Route::get('{id}/edit', ['as'=>'produtos.edit', 'uses'=>'ProdutoController@edit']);

	Route::put('{id}/update', ['as'=>'produtos.update', 'uses'=>'ProdutoController@update']);

	Route::get('{id}/destroy', ['as'=>'produtos.destroy', 'uses'=>'ProdutoController@destroy']);

});


Route::group(['prefix'=>'pedidos'], function (){

	Route::get('', ['as'=>'pedidos', 'uses'=>'PedidoController@index']);

	Route::get('create', ['as'=>'pedidos.create', 'uses'=>'PedidoController@create']);

	Route::get('{id}', ['as'=>'pedidos.info', 'uses'=>'PedidoController@info']);

	Route::post('store', ['as'=>'pedidos.store', 'uses'=>'PedidoController@store']);

	Route::get('{id}/edit', ['as'=>'pedidos.edit', 'uses'=>'PedidoController@edit']);

	Route::put('{id}/update', ['as'=>'pedidos.update', 'uses'=>'PedidoController@update']);

	Route::get('{id}/destroy', ['as'=>'pedidos.destroy', 'uses'=>'PedidoController@destroy']);

});
