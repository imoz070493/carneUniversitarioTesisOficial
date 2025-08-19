<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscritos', function (Blueprint $table) {
            $table->id();
            $table->string('escuela_profesional',100);
            $table->string('numero_documento',11);
            $table->string('dni',8);
            $table->string('codigo_estudiante',11);
            $table->string('apellido_paterno',100);
            $table->string('apellido_materno',100);
            $table->string('nombres',100);
            $table->string('apellido_paterno_validado',100)->nullable();
            $table->string('apellido_materno_validado',100)->nullable();
            $table->string('nombres_validado',100)->nullable();
            $table->string('sexo',100);
            $table->string('foto');
            $table->boolean('foto_validado',10);
            $table->boolean('voucher_validado',10)->nullable();
            $table->boolean('duplicado',10);
            $table->string('credencial_validado',20);//validado, no_validado, no_encontrado
            $table->datetime('fecha_anulado')->nullable();
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
        Schema::dropIfExists('inscritos');
    }
}
