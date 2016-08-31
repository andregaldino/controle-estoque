<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Saida extends Model
{
	public function produto()
	{
		return $this->belongsTo('App\Produto');
	}

	public function funcionario()
	{
		return $this->belongsTo('App\Funcionario')->withTrashed();
	}


    public function scopeHistorico($query)
    {
        return $query
        ->leftjoin('produtos','produto_id','=','produtos.id')
        ->select(DB::raw('sum(qntd) as qntd_periodo, CONCAT(produtos.nome ," ", produtos.medida) as nome,produtos.medida as tamanho, produtos.id as id'))
        ->groupBy('produto_id');
    }

    public function scopeHistoricoData($query, $type)
    {
        return $query
        ->Historico()
        ->whereBetween('data',$type);
    }

    public function scopeHistoricoLastMonth($query, $type)
    {
        return $query
        ->Historico()
        ->where('saidas.created_at','>=',$type);
    }



}
