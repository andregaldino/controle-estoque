<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produto;
use App\Entrada;
use Carbon\Carbon;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getViewEntrada($id)
    {
        $produto = Produto::findOrFail($id);
        return View('admin.produto.entrada',compact('produto'));
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
            $entrada = new Entrada;
            $entrada->qntd = $input['qntd'];
            $entrada->data = Carbon::createFromFormat('d/m/Y', $input['data']);
            $entrada->produto()->associate($produto);

            $entrada->save();

            return redirect()->route('epis.index');

        } catch (Exception $e) {
            return redirect()->back()
            ->with('error', $e->getMessage())
            ;
        }
    }

}
