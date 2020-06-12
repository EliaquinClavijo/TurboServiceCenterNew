<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelo extends Model
{
    protected $table = 'modelo';
    protected $primaryKey = "id";

    protected $fillable = [
    	'name',
        'created_at',
    	'update_at'
    ];

    public function parnos()
    {
        return $this->hasMany(\App\modelospartno::class,'idmodelo','id');
    }
}
