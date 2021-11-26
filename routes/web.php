<?php

use App\AgendaMarcacao;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if (Auth::check()) {         
        return redirect()->route('home');    
    } else {
        return view('welcome');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('agenda', 'AgendaController')->middleware('auth')->middleware('can:ehMedico');
Route::resource('agenda.marcacao', 'AgendaMarcacaoController')->middleware('auth')->middleware('can:ehMedico');
Route::resource('paciente', 'PacienteController')->middleware('auth')->middleware('can:ehMedico');
Route::put('/marcacao/cancela/{id}', 'AgendaMarcacaoController@cancela')->name('marcacao.cancela')->middleware('can:ehPaciente');
Route::get('/paciente/share/{id}','PacienteController@share')->name('paciente.share')->middleware('can:ehMedico');
Route::post('/paciente/shareStore/{id}', 'PacienteController@shareStore')->name('paciente.shareStore')->middleware('can:ehMedico');
Route::resource('medico.especialidade', 'MedicoEspecialidadeController')->middleware('auth')->middleware('can:ehMedico');
