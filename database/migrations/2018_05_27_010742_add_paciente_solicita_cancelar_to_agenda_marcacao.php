<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPacienteSolicitaCancelarToAgendaMarcacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agenda_marcacoes', function (Blueprint $table) {
            $table->dateTime('paciente_solicita_cancelar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agenda_marcacoes', function (Blueprint $table) {
            $table->dropColumn('paciente_solicita_cancelar');
        });
    }
}
