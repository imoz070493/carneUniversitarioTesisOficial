<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFechaInicioFinEdicionInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->datetime('fecha_inicio_edicion')->nullable();
            $table->datetime('fecha_fin_edicion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio_edicion']);
            $table->dropColumn(['fecha_fin_edicion']);
        });
    }
}
