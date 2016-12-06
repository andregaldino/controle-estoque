<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acidente extends Model
{
    public function funcionarios()
    {
        return $this->belongsToMany('App\Funcionario','acidente_funcionario');
    }

    public function tipo()
    {
    	return $this->belongsTo('App\TipoAcidente','tipo_acidente_id');
    }
}
