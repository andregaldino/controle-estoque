<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    

    public function funcionarios()
    {
    	return $this->hasMany('App\Funcionario');
    }
}
