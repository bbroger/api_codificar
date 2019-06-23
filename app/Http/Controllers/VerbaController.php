<?php

namespace App\Http\Controllers;

use App\Verba;
use DB;

class VerbaController extends Controller
{
    public function home(){

    	$verba = Verba::all();

		return response()->view('verbas', [
	        'verbas' => $verba,
	    ]);			

    }

    public function get(){

		$mes_referencia = 0;
		
		if (\Request::is('api/verbas/janeiro')){
			$mes_referencia = '01';
		} elseif (\Request::is('api/verbas/fevereiro')) {
			$mes_referencia = '02';
		} elseif (\Request::is('api/verbas/marco')) {
			$mes_referencia = '03';
		} elseif (\Request::is('api/verbas/abril')) {
			$mes_referencia = '04';
		} elseif (\Request::is('api/verbas/maio')) {
			$mes_referencia = '05';
		} elseif (\Request::is('api/verbas/junho')) {
			$mes_referencia = '06';
		} elseif (\Request::is('api/verbas/julho')) {
			$mes_referencia = '07';
		} elseif (\Request::is('api/verbas/agosto')) {
			$mes_referencia = '08';
		} elseif (\Request::is('api/verbas/setembro')) {
			$mes_referencia = '09';
		} elseif (\Request::is('api/verbas/outubro')) {
			$mes_referencia = '10';
		} elseif (\Request::is('api/verbas/novembro')) {
			$mes_referencia = '11';
		} elseif (\Request::is('api/verbas/dezembro')) {
			$mes_referencia = '12';
		}

    	$verbas = DB::table('verbas')
			->distinct()
			->join("deputados2017", "deputado_id", "=", "deputados2017.id")
			->select("deputado_id", "deputados2017.nome", DB::raw("SUM(valorReembolsado) as valor_reembolsado"))
			->where("mesReferencia", "=", "$mes_referencia", "and", "deputados2017_id", "=", "deputado_id")
			->groupBy("deputado_id")
			->orderBy("valor_reembolsado", "desc")
			->limit(5)
			->get();
		
		$retorno = json_decode($verbas, JSON_PRETTY_PRINT);
		
		return  response()->json($retorno);
	}   	
}
