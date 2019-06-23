<?php

namespace App\Http\Controllers;

use DB;

class Rede_SocialController extends Controller
{
    public function home(){

    	$rede_social = DB::table('rede_socials')
	    	->distinct()
	    	->select('redeSocial', DB::raw('COUNT(*) AS qtd_deputados'))
	        ->groupBy('redeSocial')
	        ->orderBy('qtd_deputados', 'DESC')
	    	->get();		
		 
		return response()->view('redes_sociais', [
            'redes_sociais' => $rede_social
        ]);
    }

    public function get(){

    	$rede_social = DB::table('rede_socials')
	    	->distinct()
	    	->select('redeSocial', DB::raw('COUNT(*) AS qtd_deputados'))
	        ->groupBy("redeSocial")
	        ->orderBy("qtd_deputados", "DESC")
	    	->get();		
		 
		$retorno = json_decode($rede_social, JSON_PRETTY_PRINT);
		
		return response()->json($retorno);
    }    
}