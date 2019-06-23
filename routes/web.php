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

// Página inicial da aplicação
Route::get('/', 'HomeController@configurar')->name('home');

// Configurações da aplicação
Route::get('/configurar', 'HomeController@configurar')->name('configurar');
Route::get('/loader', 'HomeController@loader')->name('loader');
Route::get('/config', 'HomeController@config')->name('config');

// Rotas para exibir os resultados em JSON
Route::get('/deputados', 'DeputadoController@home')->name('deputados');
Route::get('/redes_sociais', 'Rede_SocialController@home')->name('redes_sociais');
Route::get('/verbas', 'VerbaController@home')->name('verbas');

