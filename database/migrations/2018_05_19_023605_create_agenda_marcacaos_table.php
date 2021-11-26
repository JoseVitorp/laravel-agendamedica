<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaMarcacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_marcacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agenda_id');
            $table->date('data');
            $table->time('hora_inicial');
            $table->time('hora_final');
            $table->integer('paciente_id');
            $table->text('evolucao_paciente')->nullable();
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_marcacoes');
    }
}
