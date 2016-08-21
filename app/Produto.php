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

    public function saidas()
    {
        return $this->hasMany('App\Saida');
    }

    public function getQntdAttribute()
    {
        $numentradas = $this->entradas->sum('qntd');
        $numsaidas = $this->saidas->sum('qntd');

        return $numentradas-$numsaidas;
    }
}
