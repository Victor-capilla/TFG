<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\grupos;

class cuentas extends Model
{
    protected $table = 'cuentas';

    public $timestamps = false;

    public function temas()
    {
        return $this->hasMany('App\temas');
    }

    public function mensajes()
    {
        return $this->hasMany('App\mensajes');
    }

    public function grupos()
    {
        return $this->belongsToMany('App\grupos' , 'tfg.grupos');
    }
}
