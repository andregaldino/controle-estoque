<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
	public function produto()
	{
		return $this->belongsTo('App\Produto');
	}
}
