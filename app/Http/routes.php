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
Route::resource('funcionarios','FuncionarioController');
Route::group(['prefix'=>'funcionarios'], function(){
	Route::get('adicionar/exames/{funcionario}',['as'=>'funcionarios.getExames', 'uses' => 'FuncionarioController@getViewAddExame']);
	Route::post('adicionar/exames/{funcionario}',['as'=>'funcionarios.storeExames', 'uses' => 'FuncionarioController@storeExame']);
	Route::get('exames/{funcionario}',['as'=>'funcionarios.exames', 'uses' => 'FuncionarioController@getViewExame']);
});
Route::resource('epis','ProdutoController');
Route::group(['prefix'=>'epis'], function(){
	Route::get('adicionar/entrada/{epi}',['as'=>'epis.storeEntrada', 'uses' => 'EntradaController@getViewEntrada']);

	Route::post('adicionar/epis/{epi}',['as'=>'epis.storeEntrada', 'uses' => 'EntradaController@store']);
	//Route::get('exames/{funcionario}',['as'=>'funcionarios.exames', 'uses' => 'FuncionarioController@getViewExame']);
});

