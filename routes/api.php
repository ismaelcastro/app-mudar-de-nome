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

Route::any('webhook/d4sign/call_id/{call}', 'Client\ContratacaoController@webhook_d4sign')->name('api.contratacao.webhook.d4sign');
Route::any('webhook/procuracao_d4sign/call_id/{call}', 'Client\ContratacaoController@webhook_procuracao_d4sign')->name('api.contratacao.webhook.procuracao_d4sign');
