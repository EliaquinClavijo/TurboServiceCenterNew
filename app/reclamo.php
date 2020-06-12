<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reclamo extends Model
{
    //
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['id','text','text2','fecha_reclamo','fecha_solucion','estado','servicio_id'];
}
