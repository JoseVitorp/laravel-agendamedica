<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('especialidades')->insert([    
                                        ['nome' => 'CIRURGIA ONCOLÓGICA'],        
                                        ['nome' => 'NEUROLOGIA'],                                        
                                        ['nome' => 'CARDIOLOGIA'],
                                        ['nome' => 'PEDIATRIA'],
                                        ['nome' => 'ONCOLOGIA CLÍNICA'],
                                        ['nome' => 'PSIQUIATRIA'],
                                        ['nome' => 'GINECOLOGIA'],
                                        ['nome' => 'MASTOLOGIA'],                                        
                                        ['nome' => 'PATOLOGIA'],
                                        ['nome' => 'RADIOTERAPIA'],
                                        ['nome' => 'UROLOGIA'],
                                        ['nome' => 'PROCTOLOGIA'],
                                        ['nome' => 'ENDOCRINOLOGIA'],
                                        ['nome' => 'MEDICINA NUCLEAR'],
                                        ['nome' => 'NEFROLOGIA'],
                                        ['nome' => 'PNEUMOLOGIA'],
                                        ['nome' => 'DERMATOLOGIA'],
                                        ['nome' => 'GINECOLOGIA E OBSTETRÍCIA'],
                                        ['nome' => 'OFTALMOLOGIA'],
                                        ['nome' => 'HEMATOLOGIA'],
                                        ['nome' => 'CIRURGIA CABEÇA E PESCOÇO'],
                                        ['nome' => 'CIRURGIA TORACICA'],
                                        ['nome' => 'TRAUMATOLOGIA'],
                                        ['nome' => 'MEDICINA INTERNA'],
                                        ['nome' => 'TOXICOLOGIA'],
                                        ['nome' => 'RADIOLOGIA'],
                                        ['nome' => 'CIRURGIA DA MÃO'],
                                        ['nome' => 'MEDICINA DO TRABALHO'],
                                        ['nome' => 'CIRURGIA PEDIÁTRICA'],
                                        ['nome' => 'CIRURGIA PLÁSTICA'],
                                        ['nome' => 'CIRURGIA VASCULAR'],
                                        ['nome' => 'OTORRINOLARINGOLOGIA'],
                                        ['nome' => 'ANESTESIOLOGIA'],
                                        ['nome' => 'REUMATOLOGIA'],
                                        ['nome' => 'NEUROCIRURGIA'],
                                        ['nome' => 'CARDIOLOGIA PEDIÁTRICA'],
                                        ['nome' => 'ENDOSCOPIA DIGESTIVA'],
                                        ['nome' => 'NEUROLOGIA/NEUROCIRURGIA'],
                                        ['nome' => 'NEUROLOGIA INFANTIL'],
                                        ['nome' => 'ONCOLOGIA'],
                                        ['nome' => 'ONCOLOGIA PEDIÁTRICA'],
                                        ['nome' => 'ORTOPEDIA/TRAUMATOLOGIA'],
                                        ['nome' => 'ACUPUNTURA'],
                                        ['nome' => 'ANGIOLOGIA'],
                                        ['nome' => 'FISIATRIA'],
                                        ['nome' => 'GERIATRIA'],
                                        ['nome' => 'HOMEOPATIA'],
                                        ['nome' => 'ALERGIA E IMUNOLOGIA'],
                                        ['nome' => 'CIRURGIA GERAL'],
                                        ['nome' => 'MEDICINA GERAL COMUNITÁRIA'],
                                        ['nome' => 'CIRURGIA GASTROENTEROLÓGICA'], 
                                        ['nome' => 'CIRURGIA CARDIO VASCULAR'], 
                                        ['nome' => 'MEDICINA DO ESPORTE'], 
                                        ['nome' => 'INFECTOLOGIA'], 
                                        ['nome' => 'RADIOTERAPIA'],
                                        ['nome' => 'CIRURGIA BUCOMAXILOFACIAL'], 
                                        ['nome' => 'DERMATOLOGISTA'], 
                                        ['nome' => 'GASTROENTEROLOGIA'], 
                                        ['nome' => 'ORTOPEDIA'], 
                                        ['nome' => 'CLÍNICA MÉDICA'], 
                                        ['nome' => 'PSICOLOGIA'], 
                                        ['nome' => 'ONCOLOGIA CLINICA'], 
                                        ['nome' => 'CIRURGIÃO'], 
                                        ['nome' => 'HEMATOLGISTA'], 
                                        ['nome' => 'ENDOCRINO'] 
                                    ]);         
    
        $dados['created_at'] = date('Y-m-d H:i');
        $dados['updated_at'] = date('Y-m-d H:i');
        DB::table('especialidades')->update($dados);
    }
}
