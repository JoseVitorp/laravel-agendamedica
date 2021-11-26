<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Medico;

class MedicoPaciente extends Model
{
    protected $fillable = ['medico_id', 'paciente_id']; 

    protected $table = 'medico_paciente';


    public static function ExcluiMedicoPaciente($medico_id, $paciente_id) {

        return DB::table('medico_paciente')->where('medico_id','=',$medico_id)
                                           ->where('paciente_id','=',$paciente_id)
                                           ->delete();
    }

    public static function compartilhaPaciente($paciente_id, $medico_email) {

        $medico = Medico::where('email_profissional','=',$medico_email)->get();
                                    
        //dd($medico_email,$medico);

        if ($medico->count() >= 1) {

            $medicoPaciente = MedicoPaciente::updateOrCreate(['medico_id' => $medico[0]->id, 'paciente_id' => $paciente_id]);

            $mensagem = "Paciente compartilhado com " . $medico[0]->nome;
        } else {
            $mensagem = "Não foi possível compartilhar com " . $medico_email;
        }

        return $mensagem;

    }

}
