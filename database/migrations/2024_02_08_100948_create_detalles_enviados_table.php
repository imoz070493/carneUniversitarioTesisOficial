<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesEnviadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_enviados', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',11);
            $table->string('nombre_estudiante',100);
            $table->string('estado',20);//enviado, facultad, recibido

            $table->bigInteger('documento_envio_id')->unsigned()->nullable();
            $table->foreign('documento_envio_id')->references('id')->on('documentos_enviados');

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
        Schema::dropIfExists('detalles_enviados');
    }
}
