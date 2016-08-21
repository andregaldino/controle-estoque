<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treinamento extends Model
{
	public function funcionarios()
    {
        return $this->belongsToMany('App\Funcionario','treinamento_funcionario')
        ->withPivot('data');
    }
}
