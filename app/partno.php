<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partno extends Model
{
    //
    protected $table = 'partno';
    protected $primaryKey = "id";

    protected $fillable = [
    	'name',
        'created_at',
    	'update_at'
    ];
}
