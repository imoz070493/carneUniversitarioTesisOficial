<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_documentos', function (Blueprint $table) {
            $table->id();

            $table->string('tipo',50);//constancia_primera_matricula, constancia_matricula
            $table->integer('num_correlativo');
            $table->string('anio',4);

            $table->date('fecha_primera_matricula')->nullable();

            $table->string('sede',100)->nullable();
            $table->string('ciclo',10)->nullable();
            $table->string('periodo',10)->nullable();

            $table->bigInteger('estudiante_id')->unsigned()->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');

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
        Schema::dropIfExists('solicitudes_documentos');
    }
}
