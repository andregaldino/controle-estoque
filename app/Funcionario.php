<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    
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
        ->withPivot('data');
    }

    public function treinamentos()
    {
        return $this->belongsToMany('App\Treinamento')
        ->withPivot('data');
    }
}
