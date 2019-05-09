<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensajes extends Model
{
    protected $table = 'MENSAJES';

    public $timestamps = false;

    public function temas()
    {
        return $this->belongsTo('App\temas');
    }

    public function cuentas()
    {
        return $this->belongsTo('App\cuentas');
    }

    public function fotos()
    {
        return $this->hasMany('App\fotos');
    }
}
