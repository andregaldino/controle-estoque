<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Funcionario;
use App\Empresa;
use App\Cargo;
use App\Exame;
use Carbon\Carbon;


class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::all();
        $empresas = Empresa::all();
        $cargos = Cargo::all();
        return View('admin.funcionario.index',compact('funcionarios','empresas','cargos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewAddExame($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        $exames = Exame::all();
        return View('admin.funcionario.add-exame',compact('funcionario','exames'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewExame($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return View('admin.funcionario.exame',compact('funcionario'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $funcionario = new Funcionario;
            $funcionario->nome = $input['nome'];
            $funcionario->cpf = $input['cpf'];
            $empresa = Empresa::findOrFail($input['empresa']);
            $funcionario->empresa()->associate($empresa);

            $cargo = Cargo::findOrFail($input['cargo']);

            $funcionario->save();
            $funcionario->cargos()->attach($cargo->id, [
                'data' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);

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
            $funcionario = Funcionario::findOrFail($id);
            $empresas = Empresa::all();
            $cargos = Cargo::all();
            return View('admin.funcionario.editar',compact('funcionario','empresas','cargos'));
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
    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            $funcionario = Funcionario::findOrFail($id);
            $funcionario->nome = $input['nome'];
            $funcionario->cpf = $input['cpf'];
            $empresa = Empresa::findOrFail($input['empresa']);
            $funcionario->empresa()->associate($empresa);

            $cargo = Cargo::findOrFail($input['cargo']);
            if ($funcionario->cargo[0]->id != $cargo->id) {
                $funcionario->cargos()->attach($cargo->id, [
                'data' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ]);
            }
            
            $funcionario->save();

            return redirect()->route('funcionarios.index');

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
            $funcionario = Funcionario::findOrFail($id);
            $funcionario->delete();
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
    public function storeExame(Request $request,$id)
    {
        try {
            $input = $request->all();
            $funcionario = Funcionario::findOrFail($id);
            $exames = Exame::whereIn('id',$input['exames'])->get();

            $dados = array();
            foreach ($exames as $exame) {
                $dados[$exame->id] = [
                        'data' => Carbon::now(),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                ];
            }
            //dd($dados);
            $funcionario->exames()->attach($dados);
           
            
            return redirect()->route('funcionarios.index');

        } catch (Exception $e) {
            return redirect()->back()
            ->with('error', $e->getMessage())
            ;
        }
    }
}
