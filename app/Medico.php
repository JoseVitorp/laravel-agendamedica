<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome','crm_numero','crm_uf','cpf','rg','data_nascimento','sexo','email_profissional','email_pessoal',
                           'fone_comercial', 'fone_celular', 'fone_residencial', 'end_com_logradouro', 'end_com_numero', 'end_com_complemento',
                           'end_com_bairro', 'end_com_cidade', 'end_com_uf', 'end_com_cep'];

    protected $guarded = ['id', 'created_at', 'update_at'];           

    protected $date = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }    

    public function agendas() {
        return $this->hasMany('App\Agenda');
    }
}
