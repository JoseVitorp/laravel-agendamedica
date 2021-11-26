<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('nome');
            $table->string('crm_numero');
            $table->string('crm_uf',2);
            $table->string('cpf',16)->unique();
            $table->string('rg',25)->unique();
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('email_profissional')->unique();
            $table->string('email_pessoal')->nullable();
            $table->string('fone_comercial',30);
            $table->string('fone_celular',30)->nullable();
            $table->string('fone_residencial',30)->nullable();
            $table->string('end_com_logradouro')->nullable();
            $table->string('end_com_numero')->nullable();
            $table->string('end_com_complemento')->nullable();
            $table->string('end_com_bairro')->nullable();
            $table->string('end_com_cidade')->nullable();
            $table->string('end_com_uf',2)->nullable();
            $table->string('end_com_cep',10)->nullable();
            $table->timestamps();
            $table->softDeletes();         
            $table->unique(['crm_uf','crm_numero']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
