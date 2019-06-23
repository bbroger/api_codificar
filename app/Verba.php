<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verba extends Model
{
    public $timestamps = false;
    protected $table = 'verbas';
    protected $fillable = 
    [	
		'deputado_id',
		'descTipoDespesa',
		'mesReferencia',
		'valorReembolsado',
		'dataEmissao',
		'cpfCnpj',
		'valorDespesa',
		'nomeEmitente',
    ];
}
