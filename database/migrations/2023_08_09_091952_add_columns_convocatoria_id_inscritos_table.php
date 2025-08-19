<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsConvocatoriaIdInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->bigInteger('convocatoria_id')->unsigned()->nullable();
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->dropForeign(['convocatoria_id']);
            $table->dropColumn(['convocatoria_id']);
        });
    }
}
