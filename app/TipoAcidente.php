<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAcidente extends Model
{
    protected $table = 'tipo_acidentes';

    public function acidentes()
    {
    	return $this->hasMany('App\Acidente');
    }
}
