<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsVariousEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->string('correo_institucional',30)->nullable();
            $table->string('correo_personal',50)->nullable();
            $table->string('telefono1',12)->nullable();
            $table->string('telefono2',12)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropColumn(['correo_institucional']);
            $table->dropColumn(['correo_personal']);
            $table->dropColumn(['telefono1']);
            $table->dropColumn(['telefono2']);
        });
    }
}
