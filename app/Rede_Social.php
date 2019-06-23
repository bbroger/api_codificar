<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede_Social extends Model
{
    public $timestamps = false;
    protected $table = 'rede_socials';
    protected $fillable = 
    [   
        'redeSocial',
        'deputado_id',
    ];
    
}
