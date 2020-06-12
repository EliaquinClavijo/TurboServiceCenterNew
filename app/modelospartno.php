<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelospartno extends Model
{
    //
    protected $table = 'modelospartno';
    protected $primaryKey = "id";

    protected $fillable = [
    	'idmodelo',
    	'idpartno',
        'created_at',
    	'update_at'
    ];

    public function modelo()
    {
        return $this->hasOne(\App\modelo::class,'id','idmodelo');
    }

    public function partno()
    {
        return $this->hasOne(\App\partno::class,'id','idpartno');
    }


}
