<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\AgendaMarcacao;

class AgendaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $agendas = Agenda::where('medico_id','=',$user['medico_id'])->orderBy('ativa', 'desc')->orderBy('nome', 'asc')->get();
        
        foreach ($agendas as $key => $agenda) {
            $agenda['tot_marcacao'] = AgendaMarcacao::where('agenda_id','=',$agenda['id'])->where('realizado','=',false)->whereDate('data','>=',date('Y-m-d'))->count();    
            $agenda['tot_cancelar'] = AgendaMarcacao::where('agenda_id', '=', $agenda['id'])->whereDate('data', '>=', date('Y-m-d'))->whereNotNull('paciente_solicita_cancelar')->count();
        }
        
        return view('agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('agenda.create');
    }

    public function store(Request $request)
    {        
        $user = auth()->user();

        $agendas = new Agenda;
        $agendas->nome      = $request->nome;
        $agendas->medico_id = $user['medico_id'];        
        $agendas->save();
        return redirect()->route('agenda.index')->with('alert-success', 'Agenda criada com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {

        //dd($request);
        $agenda = Agenda::findOrFail($id);
        $agenda->nome = $request->nome;        
        $agenda->ativa = $request->ativa;        
        $agenda->save();
        return redirect()->route('agenda.index')->with('alert-info', 'Agenda atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $agendas = Agenda::findOrFail($id);
        $agendas->delete();
        return redirect()->route('agenda.index')->with('alert-success', 'A agenda foi removida com sucesso!');
    }    
}