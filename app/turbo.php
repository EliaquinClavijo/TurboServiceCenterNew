<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class turbo extends Model
{
    protected $table = 'turbos';
    protected $primaryKey = "idturbo";

    protected $fillable = [
    	'name',
    	'marcas',
        'modelos',
        'motores',
        'created_at',
    	'update_at'
    ];
}
