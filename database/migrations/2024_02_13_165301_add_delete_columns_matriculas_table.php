<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteColumnsMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropColumn(['escuela_profesional']);
            $table->dropColumn(['numero_documento']);
            $table->dropColumn(['apellido_paterno']);
            $table->dropColumn(['apellido_materno']);
            $table->dropColumn(['nombres']);
            $table->dropColumn(['sexo']);

            $table->dropForeign(['convocatoria_id']);
            $table->dropColumn(['convocatoria_id']);
        });

        Schema::table('matriculas', function (Blueprint $table) {
            $table->bigInteger('estudiante_id')->unsigned()->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');

            $table->bigInteger('periodo_academico_id')->unsigned()->nullable();
            $table->foreign('periodo_academico_id')->references('id')->on('periodos_academicos');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->string('escuela_profesional',100)->nullable();
            $table->string('numero_documento',8)->nullable();
            $table->string('apellido_paterno',100)->nullable();
            $table->string('apellido_materno',100)->nullable();
            $table->string('nombres',100)->nullable();
            $table->string('sexo',100)->nullable();

            $table->bigInteger('convocatoria_id')->unsigned()->nullable();
            $table->foreign('convocatoria_id')->references('id')->on('periodos_academicos');
        });

        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropForeign(['estudiante_id']);
            $table->dropColumn(['estudiante_id']);
            $table->dropForeign(['periodo_academico_id']);
            $table->dropColumn(['periodo_academico_id']);
        });
    }
}
