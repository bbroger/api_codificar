<?php

namespace App\Http\Controllers;

use App\Deputado;


class DeputadoController extends Controller
{
    public function home(){

        $deputados = Deputado::orderBy('nome', 'asc')
                        ->get();

		return response()->view('deputados', [
            'deputados' => $deputados,
        ]);

    }
}
