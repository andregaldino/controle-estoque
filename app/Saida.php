<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
	public function produto()
	{
		return $this->belongsTo('App\Produto');
	}

	public function funcionario()
	{
		return $this->belongsTo('App\Funcionario');
	}
}
