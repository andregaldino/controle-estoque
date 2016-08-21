<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exame extends Model
{
	use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function funcionarios()
    {
        return $this->belongsToMany('App\Funcionario','exame_funcionario')
        ->withPivot('data');
    }
}
