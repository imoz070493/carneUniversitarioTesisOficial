<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',10);
            $table->string('descripcion',100)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado');//inactivo,activo,finalizado
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
        Schema::dropIfExists('periodos_academicos');
    }
}
