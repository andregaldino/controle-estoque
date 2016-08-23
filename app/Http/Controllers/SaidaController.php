<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Saida;
use App\Funcionario;
use Carbon\Carbon;
use Exception;

class SaidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewSaida($id)
    {
        $produto = Produto::findOrFail($id);
        $funcionarios = Funcionario::orderBy('nome','asc')->get();
        return View('admin.produto.saida',compact('produto','funcionarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $input = $request->all();
            $produto = Produto::findOrFail($id);
            
            if (($produto->qntd - $input['qntd']) < 0) {
                throw new Exception("Quantidade de Saida maior que o Estoque do Produto"); 
            }

            $funcionario = Funcionario::findOrFail($input['funcionario']);
            $saida = new Saida;
            $saida->qntd = $input['qntd'];

            $saida->data = Carbon::createFromFormat('d/m/Y', $input['data']);
            $saida->produto()->associate($produto);
            $saida->funcionario()->associate($funcionario);

            $saida->save();

            return redirect()->route('epis.index');

        } catch (Exception $e) {
            return redirect()->back()
            ->with('error', $e->getMessage())
            ;
        }
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saidas = Saida::all();
        return View('admin.saida.index',compact('saidas'));
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewSearch()
    {
        $saidas = [];
        return View('admin.saida.busca',compact('saidas'));
    }

    public function search(Request $request)
    {
        try {
            $input = $request->all();
            $users = Funcionario::orderBy('nome','acs')->withTrashed()->get();
            $produtos = Produto::orderBy('nome','acs')->get();

            $saidas = array();
            foreach ($users as $value) {
                $saidas[] =[
                    'funcionario' => $value->nome,
                    'funcionario_id' => $value->id,
                    'saidas' => $value->saidas()->HistoricoData([
                                    'datainicio'=>Carbon::createFromFormat('d/m/Y',$input['datainicio']),
                                    'datafinal'=>Carbon::createFromFormat('d/m/Y',$input['datafinal'])
                                    ]
                                )->get()
                ];
            }
            return View('admin.saida.busca',compact('saidas','produtos'));
        } catch (Exception $e) {
            $saidas = [];
            dd($e);
            return View('admin.saida.busca',compact('saidas'));
        }
    }



}
