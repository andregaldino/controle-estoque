<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Saida;
use App\Funcionario;
use Carbon\Carbon;

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
        $funcionarios = Funcionario::all();
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
}
