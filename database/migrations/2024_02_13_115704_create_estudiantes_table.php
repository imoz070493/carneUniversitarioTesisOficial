<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('facultad',100);
            $table->string('escuela_profesional',100);
            $table->string('dni',8);
            $table->string('codigo_estudiante',11);
            $table->string('apellido_paterno',100);
            $table->string('apellido_materno',100);
            $table->string('nombres',100);
            $table->string('sexo',20)->nullable();//masculino,femenino
            $table->string('periodo_primera_matricula',8)->nullable();//200202, 200301, 2023-01
            $table->text('observacion',10)->nullable();
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
        Schema::dropIfExists('estudiantes');
    }
}
