<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Sentinel::check()) {
            redirect()->route('dashboard');
        }
        
        return View('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $prods = \App\Produto::all();

        $vetor = \App\Lembrete::all();
        $lembretes=[];
        foreach ($vetor as $value) {
            if ($value->produto->qntd <= $value->min) {
                $lembretes[] = $value;
            }
        }

        $produtos = \App\Saida::HistoricoLastMonth(Carbon::now()->subMonth())->get();

        $lastsaidas = \App\Saida::orderBy('id','desc')->take(5)->get();
        $lastentradas = \App\Entrada::orderBy('id','desc')->take(5)->get();
        return View('admin.dashboard',compact('lastsaidas','lastentradas','lembretes','produtos'));
    }
    
}
