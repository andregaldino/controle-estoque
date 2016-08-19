<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return View('admin.empresa.index',compact('empresas'));
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
            $empresa = new Empresa;
            $empresa->nome = $input['nome'];
            $empresa->razao = $input['razao'];
            $empresa->cnpj = $input['cnpj'];
            $empresa->save();
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
            $empresa = Empresa::findOrFail($id);
            return View('admin.empresa.editar',compact('empresa'));
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
            $empresa = Empresa::findOrFail($id);
            $empresa->nome = $input['nome'];
            $empresa->razao = $input['razao'];
            $empresa->cnpj = $input['cnpj'];
            $empresa->save();

            return redirect()->route('empresas.index');

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
            $empresa = Empresa::findOrFail($id);
            $empresa->delete();
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
            ->with('error',$e->getMessage());
        }
    }
}
