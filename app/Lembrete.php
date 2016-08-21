<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lembrete extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function produto()
    {
    	return $this->belongsTo('App\Produto')
    	->withTrashed();
    }
}
