<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cotizacion extends Model
{
	protected $table = 'cotizacion';
    
    protected $primaryKey = "id";
    
    protected $fillable = [
    	'fecha',
    	'turbo',
    	'modelo',
    	'marca',
    	'motor',
    	'placa',
    	'descripcion',
    	'importe',
    	'costo_total',
    	'cliente_id',
    	'created_at',
    	'update_at'
    ];
}
