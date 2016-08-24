<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TreinamentoRequest;
use App\Http\Requests\TreinamentoFuncionarioRequest;
use App\Treinamento;
use App\Funcionario;
use Carbon\Carbon;
use Exception;
class TreinamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treinamentos = Treinamento::all();
        return View('admin.treinamento.index',compact('treinamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewAddFuncionarios($id)
    {
        $treinamento = Treinamento::findOrFail($id);
        $funcionarios = Funcionario::all();
        return View('admin.treinamento.add-funcionarios',compact('treinamento','funcionarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TreinamentoRequest $request)
    {
        try {
            $input = $request->all();
            $treinamento = new Treinamento;
            $treinamento->nome = $input['nome'];
            $treinamento->descricao = $input['descricao'];
            $treinamento->save();
            return response()->json(
                ['code' => 200, 'msg' => 'Sucesso']
            );
        } catch (\Exception $e) {
            return response()->json(
                ['code' => 400, 'msg' => $e->getMessage()]
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $treinamento = Treinamento::findOrFail($id);
            return View('admin.treinamento.editar',compact('treinamento'));
        } catch (Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TreinamentoRequest $request, $id)
    {
        try {
            $input = $request->all();
            $treinamento = Treinamento::findOrFail($id);
            $treinamento->nome = $input['nome'];
            $treinamento->descricao = $input['descricao'];
            $treinamento->save();

            return redirect()->route('treinamentos.index');

        } catch (Exception $e) {
            return redirect()->back()
            ->with('error', $e->getMessage())
            ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $treinamento = Treinamento::findOrFail($id);
            $treinamento->delete();
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
            ->with('error',$e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFuncionarios(TreinamentoFuncionarioRequest $request,$id)
    {
        try {
            $input = $request->all();
            $treinamento = Treinamento::findOrFail($id);
            $funcionarios = Funcionario::whereIn('id',$input['funcionarios'])->get();

            $dados = array();
            foreach ($funcionarios as $funcionario) {
                $dados[$funcionario->id] = [
                        'data' => Carbon::createFromFormat('d/m/Y', $input['data']),
                        'created_at' => Carbon::createFromFormat('d/m/Y', $input['data']),
                        'updated_at' => Carbon::createFromFormat('d/m/Y', $input['data']),
                ];
            }
            $treinamento->funcionarios()->attach($dados);
           
            
            return redirect()->route('treinamentos.index');

        } catch (Exception $e) {
            return redirect()->back()
            ->with('error', $e->getMessage())
            ;
        }
    }
}
