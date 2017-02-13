<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TiposRequest;
use App\TipoAcidente;
use Exception;

class TipoAcidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoAcidente::all();
        return View('admin.tipoacidente.index',compact('tipos'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiposRequest $request)
    {
        try {
            $input = $request->all();
            $tipo = new TipoAcidente;
            $tipo->nome = $input['nome'];
            if ($request->has('descricao')) {
                $tipo->descricao = $input['descricao'];
            }

            $tipo->save();
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
            $tipo = TipoAcidente::findOrFail($id);
            return View('admin.tipoacidente.editar',compact('tipo'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TiposRequest $request, $id)
    {
        try {
            $input = $request->all();
            $tipo = TipoAcidente::findOrFail($id);
            $tipo->nome = $input['nome']; 
            if ($request->has('descricao')) {
                $tipo->descricao = $input['descricao'];
            }
            $tipo->save();

            return redirect()->route('tiposacidentes.index');

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
            $tipo = TipoAcidente::findOrFail($id);
            $tipo->delete();
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
            ->with('error',$e->getMessage());
        }
    }
}
