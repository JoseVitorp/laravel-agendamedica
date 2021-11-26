<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sexo',1);
            $table->date('data_nascimento');
            $table->string('email');
            $table->string('fone_residencial')->nullable();
            $table->string('fone_celular')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('end_res_logradouro')->nullable();
            $table->string('end_res_numero')->nullable();
            $table->string('end_res_complemento')->nullable();
            $table->string('end_res_bairro')->nullable();
            $table->string('end_res_cidade')->nullable();
            $table->string('end_res_uf', 2)->nullable();
            $table->string('end_res_cep', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();                     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
