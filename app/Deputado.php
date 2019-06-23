<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{
    public $timestamps = false;
    protected $table = 'deputados'; 
    protected $fillable = 
    [
        'id',
        'nome',
        'partido',
        'tag_localizacao',
    ]; 
}

