<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MedicoEspecialidade extends Model
{
    protected $fillable = ['medico_id', 'especialidade_id'];

    protected $table = 'medico_especialidade';


    public static function listaMedicoEspecialidades($medico_id) {

        return DB::table('medico_especialidade as me')
                    ->join('especialidades as e','me.especialidade_id','=','e.id')
                    ->where('me.medico_id','=',$medico_id)
                    ->select('me.id','e.nome')  
                    ->orderBy('e.nome')
                    ->get();
    }
}
