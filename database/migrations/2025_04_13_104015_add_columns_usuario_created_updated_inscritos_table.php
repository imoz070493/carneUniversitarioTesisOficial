<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUsuarioCreatedUpdatedInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->bigInteger('usuario_create_id')->unsigned()->nullable();
            $table->foreign('usuario_create_id')->references('id')->on('users');

            $table->bigInteger('usuario_update_id')->unsigned()->nullable();
            $table->foreign('usuario_update_id')->references('id')->on('users');
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
            $table->dropForeign(['usuario_create_id']);
            $table->dropColumn(['usuario_create_id']);

            $table->dropForeign(['usuario_update_id']);
            $table->dropColumn(['usuario_update_id']);
        });
    }
}
