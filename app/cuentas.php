<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuentas extends Model
{
    protected $table = 'CUENTAS';

    public $timestamps = false;

    public function temas()
    {
        return $this->hasMany('App\temas');
    }

    public function mensajes()
    {
        return $this->hasMany('App\mensajes');
    }
}
