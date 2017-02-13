<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EPIRequest;
use App\Produto;
use App\Categoria;
use App\Lembrete;
use App\Entrada;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return View('admin.produto.index',compact('produtos','categorias'));
    }

    

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EPIRequest $request)
    {
        try {
            $input = $request->all();
            $produto = new Produto;
            $produto->nome = $input['nome'];
            $produto->medida = $input['medida'];
            if ($request->has('ca')) {
                $produto->ca = $input['ca'];
            }

            $categoria = Categoria::findOrFail($input['categoria']);

            $produto->categoria()->associate($categoria);

            $produto->save();

            if ($request->has('min')){
                $lembrete = new Lembrete;
                $lembrete->min = $input['min'];

                $lembrete->produto()->associate($produto);
                $lembrete->save();
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
            $produto = Produto::findOrFail($id);
            $categorias = Categoria::all();
            return View('admin.produto.editar',compact('produto','categorias'));
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
    public function update(EPIRequest $request, $id)
    {
        try {
            $input = $request->all();
            $produto = Produto::findOrFail($id);
            $produto->nome = $input['nome'];
            $produto->medida = $input['medida'];
            if ($request->has('ca')) {
                $produto->ca = $input['ca'];
            }

            $categoria = Categoria::findOrFail($input['categoria']);

            $produto->categoria()->associate($categoria);

            $produto->save();

            return redirect()->route('epis.index');

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
            $produto = Produto::findOrFail($id);
            $produto->delete();
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
            ->with('error',$e->getMessage());
        }
    }
    
}
