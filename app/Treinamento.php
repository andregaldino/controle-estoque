<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treinamento extends Model
{
	use SoftDeletes;
    protected $dates = ['deleted_at'];
	public function funcionarios()
    {
        return $this->belongsToMany('App\Funcionario','treinamento_funcionario')
        ->withTrashed()
        ->withPivot('data');
    }
}
