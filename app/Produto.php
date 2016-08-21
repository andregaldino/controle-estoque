<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function lembretes()
    {
    	return $this->hasMany('App\Lembrete');
    }

    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }

    public function entradas()
    {
    	return $this->hasMany('App\Entrada');
    }
}
