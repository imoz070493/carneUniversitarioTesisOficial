<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('ruc',12);
            $table->string('razon_social',300);
            $table->string('nombre_comercial',300);
            $table->string('direccion',300);
            $table->string('departamento',300);
            $table->string('provincia',300);
            $table->string('distrito',300);
            $table->string('codpais',100)->nullable();
            $table->string('ubigeo',100)->nullable();
            $table->string('telefono',50)->nullable();
            $table->string('correo',300)->nullable();
            $table->string('usuario',50)->nullable();
            $table->string('clave',50)->nullable();
            $table->string('firma',200)->nullable();
            $table->string('tipo',50);
            $table->string('imagen',50)->nullable();
            $table->string('estado',20);
            $table->boolean('restringir_stock')->nullable();

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
        Schema::dropIfExists('configs');
    }
}
