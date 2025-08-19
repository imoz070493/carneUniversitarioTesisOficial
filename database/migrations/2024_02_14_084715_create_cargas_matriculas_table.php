<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargasMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargas_matriculas', function (Blueprint $table) {
            $table->id();
            $table->string('document',100);
            $table->string('job_id',20);
            $table->string('periodo_academico_id',10);
            $table->text('errores')->nullable();
            $table->string('estado',20);//cargado, con_error, completado
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
        Schema::dropIfExists('cargas_matriculas');
    }
}
