<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('verbas')->group(function () {
    Route::name('verbas.')
        ->group(function () {
			Route::get('/janeiro', 'VerbaController@get')->name("janeiro");
			Route::get('/fevereiro', 'VerbaController@get')->name("fevereiro");
			Route::get('/marco', 'VerbaController@get')->name("marco");
			Route::get('/abril', 'VerbaController@get')->name("abril");
			Route::get('/maio', 'VerbaController@get')->name("maio");
			Route::get('/junho', 'VerbaController@get')->name("junho");
			Route::get('/julho', 'VerbaController@get')->name("julho");
			Route::get('/agosto', 'VerbaController@get')->name("agosto");
			Route::get('/setembro', 'VerbaController@get')->name("setembro");
			Route::get('/outubro', 'VerbaController@get')->name("outubro");
			Route::get('/novembro', 'VerbaController@get')->name("novembro");
			Route::get('/dezembro', 'VerbaController@get')->name("dezembro");
        });
});

Route::prefix('redes_sociais')->group(function () {
    Route::name('redes_sociais.')
        ->group(function () {
			Route::get('/mais_utilizadas', 'Rede_SocialController@get')->name("mais_utilizadas");
        });
});