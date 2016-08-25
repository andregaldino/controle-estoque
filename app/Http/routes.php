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

Route::get('/', ['as'=> 'index', 'uses' => 'FrontendController@index']);
Route::resource('categorias','CategoriaController');
Route::resource('treinamentos','TreinamentoController');

Route::group(['prefix'=>'treinamentos'], function(){
	Route::get('adicionar/funcionarios/{treinamento}',['as'=>'treinamentos.addFuncionarios', 'uses' => 'TreinamentoController@getViewAddFuncionarios']);

	Route::post('adicionar/funcionarios/{treinamento}',['as'=>'treinamentos.storeFuncionarios', 'uses' => 'TreinamentoController@storeFuncionarios']);
	//Route::get('exames/{funcionario}',['as'=>'funcionarios.exames', 'uses' => 'FuncionarioController@getViewExame']);
});
Route::resource('exames','ExameController');
Route::resource('cargos','CargoController');
Route::resource('empresas','EmpresaController');
Route::resource('funcionarios','FuncionarioController',['only' => ['index','store','update','edit','destroy']]);
Route::group(['prefix'=>'funcionarios'], function(){
	Route::get('adicionar/exames/{funcionario}',['as'=>'funcionarios.getExames', 'uses' => 'FuncionarioController@getViewAddExame']);
	Route::post('adicionar/exames/{funcionario}',['as'=>'funcionarios.storeExames', 'uses' => 'FuncionarioController@storeExame']);
	
	Route::get('exames/{funcionario}',['as'=>'funcionarios.exames', 'uses' => 'FuncionarioController@getViewExame']);

	Route::get('excluidos',['as'=>'funcionarios.excluidos', 'uses' => 'FuncionarioController@getViewDemitidos']);

	Route::get('todos',['as'=>'funcionarios.todos', 'uses' => 'FuncionarioController@getViewTodos']);
});
Route::resource('epis','ProdutoController');
Route::group(['prefix'=>'epis'], function(){
	Route::get('adicionar/entrada/{epi}',['as'=>'epis.storeEntrada', 'uses' => 'EntradaController@getViewEntrada']);
	Route::post('adicionar/entrada/{epi}',['as'=>'epis.storeEntrada', 'uses' => 'EntradaController@store']);

	Route::get('adicionar/saida/{epi}',['as'=>'epis.storeSaida', 'uses' => 'SaidaController@getViewSaida']);
	Route::post('adicionar/saida/{epi}',['as'=>'epis.storeSaida', 'uses' => 'SaidaController@store']);


	//Route::get('exames/{funcionario}',['as'=>'funcionarios.exames', 'uses' => 'FuncionarioController@getViewExame']);
});
Route::resource('saidas','SaidaController', ['only' => ['index','store']]);
Route::group(['prefix'=>'saidas'], function(){
	Route::get('relatorios',['as'=>'saidas.search', 'uses' => 'SaidaController@getViewSearch']);
	Route::post('relatorios',['as'=>'saidas.search', 'uses' => 'SaidaController@search']);
});


Route::resource('entradas','EntradaController');