<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasCpesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas_cpes', function (Blueprint $table) {
            $table->id();
            $table->string('numRuc',11);
            $table->string('codComp',2);
            $table->string('numeroSerie',4);
            $table->string('numero',11);
            $table->string('fechaEmision',10);
            $table->decimal('monto',12,6);
            $table->string('origen',60);
            $table->string('success',10)->nullable();
            $table->string('message',60)->nullable();
            $table->text('data')->nullable();
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
        Schema::dropIfExists('consultas_cpes');
    }
}
