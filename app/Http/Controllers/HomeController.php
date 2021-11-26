<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaMarcacao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->medico_id == null) {

            $marcacoes = AgendaMarcacao::listaMarcacoesPaciente(auth()->user()->paciente_id);

            //dd($marcacoes);

            return view('paciente-home',compact('marcacoes'));    
        } else {            
            return view('medico-home');
        }
    }
}
