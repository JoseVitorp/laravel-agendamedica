<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;
use App\Paciente;
use App\MedicoPaciente;
use App\User;
use App\Medico;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $user = auth()->user();        

        if (isset($request->busca)) {
            $busca = $request->busca;
        } else {
            $busca = '';
        }

        $pacientes = Paciente::listaPacienteMedico($user->medico_id,$busca);        

        return view('paciente.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $generator = new ComputerPasswordGenerator();
        
        $generator->setUppercase(true)
                  ->setLowercase(false)
                  ->setNumbers(true)
                  ->setSymbols(false)
                  ->setLength(4);
        
        $password = $generator->generatePassword();       

        $data = $request->all();
        $medico_user = auth()->user();

        $paciente = new Paciente;
        $paciente->fill($data);
        $paciente->save();

        $medicopaciente = new MedicoPaciente;
        $medicopaciente->medico_id = $medico_user->medico_id; 
        $medicopaciente->paciente_id = $paciente->id;
        $medicopaciente->save();

        $user = new User;
        $user->name        = $paciente->nome;
        $user->email       = $paciente->email;
        $user->password    = Hash::make($password);
        $user->paciente_id = $paciente->id;
        $user->save();

        return redirect()->route('paciente.index')->with('alert-success', 'O paciente foi adicionado com sucesso! Senha: '. $password);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico_id = auth()->user()->medico_id;

        $evolucoes = Paciente::listaPacienteEvolucao($id,$medico_id);

        return view('paciente.show',compact('evolucoes'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('paciente.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();        
        $paciente = Paciente::findOrFail($id);        
        $paciente->fill($data);        
        $paciente->save();

        $mensagem = 'Paciente atualizado com sucesso!';
  
        if (isset($data['gera_senha'])) {        
         
            $generator = new ComputerPasswordGenerator();

            $generator->setUppercase(true)
                ->setLowercase(false)
                ->setNumbers(true)
                ->setSymbols(false)
                ->setLength(4);

            $password = $generator->generatePassword(); 
            
            DB::table('users')
                ->where('paciente_id', $id)
                ->update(['password' => Hash::make($password)]);

            $mensagem .= ' Nova senha: ' . $password;         
        }

        return redirect()->route('paciente.index')->with('alert-info', $mensagem);
    }

    /**
     * Remove the specified resource from storage..
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        MedicoPaciente::ExcluiMedicoPaciente($user->medico_id,$id);

        return redirect()->route('paciente.index')->with('alert-success', 'O paciente foi removido com sucesso!');
    }

    public function share($id) {

        $paciente = Paciente::findOrFail($id);

        return view('paciente.share',compact('paciente'));
    }

    public function shareStore(Request $request, $id) {

        $mensagem = MedicoPaciente::compartilhaPaciente($id, $request->email_medico);
        
        return redirect()->route('paciente.index')->with('alert-info', $mensagem);

    }

}
