<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteColumnsInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->dropColumn(['escuela_profesional']);
            $table->dropColumn(['numero_documento']);
            $table->dropColumn(['dni']);
            $table->dropColumn(['apellido_paterno']);
            $table->dropColumn(['apellido_materno']);
            $table->dropColumn(['nombres']);
            $table->dropColumn(['sexo']);
        });

        Schema::table('inscritos', function (Blueprint $table) {
            $table->bigInteger('estudiante_id')->unsigned()->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
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
            $table->dropForeign(['estudiante_id']);
            $table->dropColumn(['estudiante_id']);
        });

        Schema::table('inscritos', function (Blueprint $table) {
            $table->string('escuela_profesional',100)->nullable();
            $table->string('numero_documento',11)->nullable();
            $table->string('dni',8)->nullable();
            $table->string('apellido_paterno',100)->nullable();
            $table->string('apellido_materno',100)->nullable();
            $table->string('nombres',100)->nullable();
            $table->string('sexo',100)->nullable();
        });
    }
}
