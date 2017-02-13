<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaidaRequest;
use App\Http\Requests\SaidaBuscaRequest;
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
    public function store(SaidaRequest $request, $id)
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

            $saida->data = Carbon::createFromFormat('d/m/Y', $input['data'])->startOfDay();
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

    public function search(SaidaBuscaRequest $request)
    {
        try {
            $input = $request->all();
            $users = Funcionario::orderBy('nome','asc')->withTrashed()->get();
            $produtos = Produto::orderBy('nome','asc')->get();

            $saidas = array();
            foreach ($users as $value) {
                    $out = [];
                    $vetor = $value->saidas()->HistoricoData([
                                    'datainicio'=>Carbon::createFromFormat('d/m/Y',$input['datainicio'])->startOfDay(),
                                    'datafinal'=>Carbon::createFromFormat('d/m/Y',$input['datafinal'])->endOfDay()
                                    ]
                                )->get();
                    //preenche o array de saidas com o id do produto e a quantidade para o produto, sendo zero para caso o produto nao esteja listado no retorno do metodo HistoricoData
                    foreach ($produtos as $produto) {
                        $achou = false;
                        if (count($vetor)>0) {
                            foreach ($vetor as $v) {
                                if ($v->id == $produto->id) {
                                    $out[] = [
                                        'id' => $v->id,
                                        'qntd' => $v->qntd_periodo,
                                        'nome' => $produto->nome 
                                    ];
                                $achou = true;
                                break;
                                }
                            }
                            if (!$achou) {
                                $out[] = [
                                        'id' => $produto->id,
                                        'qntd' => 0,
                                        'nome' => $produto->nome 
                                    ];
                            }
                        }
                    }
                $saidas[] =[
                    'funcionario' => $value->nome,
                    'funcionario_id' => $value->id,
                    'saidas' => $out
                ];
            }


            $periodo= [
                'inicio' =>$input['datainicio'],
                'final' =>$input['datafinal']
            ];
            return View('admin.saida.busca',compact('saidas','produtos','periodo'));
        } catch (Exception $e) {
            $saidas = [];
            return View('admin.saida.busca',compact('saidas'))->with('error', $e->getMessage());
        }
    }



}
