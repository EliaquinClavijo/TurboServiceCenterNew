<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordenservicio extends Model
{
    //
    protected $table = 'ordenservicio';
    protected $primaryKey = "idordenservicio";

    protected $fillable = [
    	'idcliente',
    	'idservicio',
        'marca',
        'modelo',
        'created_at',
    	'update_at'
    ];
}
