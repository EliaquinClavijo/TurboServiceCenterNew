<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    //
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['id','nombre','apellido_pate','apellido_mate','nro_celular'];
}
