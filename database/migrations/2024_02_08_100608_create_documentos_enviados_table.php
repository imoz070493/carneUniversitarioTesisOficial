<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosEnviadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_enviados', function (Blueprint $table) {
            $table->id();
            $table->string('carta',100);
            $table->string('facultad',100);//Ciencias, Ingenieria
            $table->datetime('fecha_procesado')->nullable();
            $table->datetime('fecha_envio_facultad')->nullable();
            $table->datetime('fecha_recibido')->nullable();
            $table->string('estado')->nullable();//procesando, facultad, recibido
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
        Schema::dropIfExists('documentos_enviados');
    }
}
