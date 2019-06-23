<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deputado2017 extends Model
{
    public $timestamps = false;
    protected $table = 'deputados2017'; 
    protected $fillable = 
    [
        'id',
        'nome',
        'partido',
        'tag_localizacao',
    ]; 
}

