<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','medico_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function medico()
    {
        return $this->hasOne('App\Medico');
    }

    public static function getTratamento($medico_id)
    {

        if (isset($medico_id)) {
            $m = new Medico;
            $m = Medico::findOrFail($medico_id);

            if ($m->sexo == "F") {
                return "Dra.";
            } else {
                return "Dr.";
            }
        } else {
            return "";
        }
    }
}
