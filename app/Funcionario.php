<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function empresa()
    {
    	return $this->belongsTo('App\Empresa');
    }

    public function cargos()
    {
    	return $this->belongsToMany('App\Cargo');
    }

    public function cargo()
    {
    	return $this->belongsToMany('App\Cargo')
    	->latest();
    }

    public function exames()
    {
        return $this->belongsToMany('App\Exame')
        ->withTrashed()
        ->withPivot('data');
    }

    public function treinamentos()
    {
        return $this->belongsToMany('App\Treinamento')
        ->withTrashed()
        ->withPivot('data');
    }
}
