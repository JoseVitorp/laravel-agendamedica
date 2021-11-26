<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nome','medico_id','ativa'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $date = ['deleted_at'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }
}
