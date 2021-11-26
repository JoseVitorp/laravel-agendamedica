<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('ehPaciente', function ($user) {
                return ($user->paciente_id != null) && (($user->medico_id == null))  ;
        });

        Gate::define('ehMedico', function ($user) {
            return ($user->paciente_id == null) && (($user->medico_id != null));
        });


    }
}
