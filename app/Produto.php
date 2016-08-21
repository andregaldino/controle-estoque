<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function lembretes()
    {
    	return $this->hasMany('App\Lembrete')
        ->withTrashed();
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
