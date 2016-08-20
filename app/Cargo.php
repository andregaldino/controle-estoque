<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function funcionarios()
    {
    	return $this->belongsToMany('App\Funcionario');
    }
}
