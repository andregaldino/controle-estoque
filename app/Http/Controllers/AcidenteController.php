<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcidenteRequest;
use App\Acidente;
use App\TipoAcidente;
use App\Funcionario;
use Exception;
use Carbon\Carbon;


class AcidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acidentes = Acidente::all();
        $tipos = TipoAcidente::all();
        $funcionarios = Funcionario::all();
        return View('admin.acidente.index',compact('acidentes','tipos','funcionarios'));
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
    public function store(AcidenteRequest $request)
    {
        try {
            $input = $request->all();
            $acidente = new Acidente;
            $acidente->descricao = $input['descricao'];
            $acidente->procedimento = $input['procedimento'];
            

            $tipo = TipoAcidente::findOrFail($input['tipo_id']);
            $acidente->tipo()->associate($tipo);

            $acidente->save();
            if ($request->has('funcionario_id')) {

                $funcionarios = Funcionario::whereIn('id',$request->get('funcionario_id'))->get();
                $dados = array();
                foreach ($funcionarios as $funcionario) {
                    $dados[$funcionario->id] = [
                            'created_at' => Carbon::Now(),
                            'updated_at' => Carbon::Now(),
                    ];
                }

                $acidente->funcionarios()->sync($dados);
            }
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
            $acidente = Acidente::findOrFail($id);
            $tipos = TipoAcidente::all();
            $funcionarios = Funcionario::all();
            return View('admin.acidente.editar',compact('acidente','tipos','funcionarios'));
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
    public function update(AcidenteRequest $request, $id)
    {
        try {
            $input = $request->all();

            $acidente = Acidente::findOrFail($id);
            $acidente->descricao = $input['descricao']; 
            $acidente->procedimento = $input['procedimento']; 
            
            $tipo = TipoAcidente::findOrFail($input['tipo_id']);
            $acidente->tipo()->associate($tipo);

            $acidente->save();
            if ($request->has('funcionario_id')) {

                $funcionarios = Funcionario::whereIn('id',$request->get('funcionario_id'))->get();
                $dados = array();
                foreach ($funcionarios as $funcionario) {
                    $dados[$funcionario->id] = [
                            'created_at' => Carbon::Now(),
                            'updated_at' => Carbon::Now(),
                    ];
                }

                $acidente->funcionarios()->sync($dados);
            }

            return redirect()->route('acidentes.index');

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
            $acidente = Acidente::findOrFail($id);
            $acidente->delete();
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
            ->with('error',$e->getMessage());
        }
    }
}
