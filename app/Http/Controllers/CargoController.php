<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cargo;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::all();
        return View('admin.cargo.index',compact('cargos'));
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
            $cargo = new cargo;
            $cargo->nome = $input['nome'];
            $cargo->descricao = $input['descricao'];
            $cargo->save();
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
            $cargo = Cargo::findOrFail($id);
            return View('admin.cargo.editar',compact('cargo'));
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
            $cargo = Cargo::findOrFail($id);
            $cargo->nome = $input['nome'];
            $cargo->descricao = $input['descricao'];
            $cargo->save();

            return redirect()->route('cargos.index');

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
            $cargo = Cargo::findOrFail($id);
            $cargo->delete();
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
            ->with('error',$e->getMessage());
        }
    }
}
