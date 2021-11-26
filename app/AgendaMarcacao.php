<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AgendaMarcacao extends Model
{
    protected $table = 'agenda_marcacoes';

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

    public static function listaMarcacoes($agenda_id,$data){

        $query = DB::table('agenda_marcacoes as am')
            ->join('pacientes as p', 'am.paciente_id', '=', 'p.id')
            ->join('agendas as a', 'am.agenda_id','=','a.id')
            ->join('medico_paciente as mp', function ($join) {            
                                                    $join->on('a.medico_id','=','mp.medico_id')
                                                         ->on('am.paciente_id','=','mp.paciente_id');
                                                })
            ->select('am.*','p.nome')
            ->whereNull('p.deleted_at')
            ->where('am.agenda_id','=',$agenda_id);
            
        if ($data != null) {
            $query->whereDate('am.data','=', $data);
        } else {
            $query->whereDate('am.data', '>=', date('Y-m-d'));
        }
        
        $dados = $query->orderBy('am.data', 'ASC')
                       ->get();

        return $dados;
    }

    public static function listaMarcacoesPaciente($paciente_id)
    {
        return DB::table('agenda_marcacoes')
            ->join('agendas', 'agenda_marcacoes.agenda_id', '=', 'agendas.id')
            ->join('medicos', 'agendas.medico_id', '=', 'medicos.id')
            ->select('agenda_marcacoes.*', 'agendas.medico_id', 'medicos.nome')            
            ->where('agenda_marcacoes.paciente_id', '=', $paciente_id)         
            ->whereDate('agenda_marcacoes.data','>=',date('Y-m-d'))
            ->orderBy('agenda_marcacoes.data', 'ASC')
            ->orderBy('agenda_marcacoes.hora_inicial','ASC')
            ->get();
    }

    public static function solicitaCancelamentoMarcacao($id) {
        
        $marcacao = AgendaMarcacao::findOrFail($id);

        if ($marcacao->evolucao == null) {
            $marcacao->paciente_solicita_cancelar = date('Y-m-d H:i:s');
            $marcacao->save();
            return true;
        } else {
            return false;
        }
    }
}