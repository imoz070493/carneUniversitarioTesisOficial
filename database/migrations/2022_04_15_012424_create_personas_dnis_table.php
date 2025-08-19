<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasDnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_dnis', function (Blueprint $table) {
            $table->id();
            $table->string('dni',8);
            $table->string('nombres',100);
            $table->string('apellidoPaterno',80);
            $table->string('apellidoMaterno',80);
            $table->string('codVerifica',2);
            $table->string('origen',60)->nullable();
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
        Schema::dropIfExists('personas_dnis');
    }
}
