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

Route::get('/', 'SiteController@index')->name('home');

Route::resource('/mes', 'MesController');

Route::resource('/contas','ContaController');

Route::get('/teste','teste\TesteController@index');

Route::get('/gerenciar/mes', 'MesController@gerenciar')->name('gerenciarMes');

Route::post('/pagar/conta/{id}', 'ContaController@pagarConta')->name('pagarConta');

Auth::routes();


