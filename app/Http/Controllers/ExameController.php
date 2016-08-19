<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exame;
class ExameController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exames = Exame::all();
        return View('admin.exame.index',compact('exames'));
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
            $exame = new Exame;
            $exame->nome = $input['nome'];
            $exame->sigla = $input['sigla'];
            $exame->duracao = $input['duracao'];
            $exame->save();
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
            $exame = Exame::findOrFail($id);
            return View('admin.exame.editar',compact('exame'));
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
            $exame = Exame::findOrFail($id);
            $exame->nome = $input['nome'];
            $exame->sigla = $input['sigla'];
            $exame->duracao = $input['duracao'];
            $exame->save();

            return redirect()->route('exames.index');

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
            $exame = Exame::findOrFail($id);
            $exame->delete();
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
            ->with('error',$e->getMessage());
        }
    }
}
