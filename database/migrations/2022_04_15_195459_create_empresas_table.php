<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('ruc',11);
            $table->string('razonSocial',200);
            $table->string('nombreComercial',200);
            $table->string('telefonos',100);
            $table->string('tipo',100);
            $table->string('estado',10);
            $table->string('condicion',10);
            $table->string('direccion',300);
            $table->string('departamento',60)->nullable();
            $table->string('provincia',60)->nullable();
            $table->string('distrito',60)->nullable();
            $table->date('fechaInscripcion',60)->nullable();
            $table->string('sistEmsion',60)->nullable();
            $table->string('sistContabilidad',60)->nullable();
            $table->string('actExterior',60)->nullable();
            $table->text('actEconomicas')->nullable();
            $table->string('cpPago',300)->nullable();
            $table->string('sistElectronica',300)->nullable();
            $table->date('fechaEmisorFe')->nullable();
            $table->string('cpeElectronico',300)->nullable();
            $table->date('fechaPle')->nullable();
            $table->string('padrones',300)->nullable();
            $table->date('fechaBaja')->nullable();
            $table->string('profesion',100)->nullable();
            $table->string('origen',100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
