<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class informe extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['id','fecha','descripcion','operacion','turbo','modelo','motor','marca','comentario','resultado','recomendaciones','cliente_id','placa','email'];

    public function cliente()
    {
        return $this->hasOne(\App\cliente::class,'id','cliente_id');
    }
}

