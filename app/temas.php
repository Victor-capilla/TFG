<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temas extends Model
{
    protected $table = 'TEMAS';

    public $timestamps = false;

    public function cuenta()
    {
        return $this->belongsTo('App\cuentas');
    }

    public function mensajes()
    {
        return $this->hasMany('App\mensajes');
    }
}
