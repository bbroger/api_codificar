<?php

namespace App\Http\Controllers;

use App\Deputado2017;


class Deputado2017Controller extends Controller
{
    public function home(){

        $deputados = Deputado2017::orderBy('nome', 'asc')
                        ->get();

		return response()->view('deputados2017', [
            'deputados2017' => $deputados,
        ]);

    }
}
