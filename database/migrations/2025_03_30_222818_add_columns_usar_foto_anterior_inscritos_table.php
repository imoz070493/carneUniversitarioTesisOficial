<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUsarFotoAnteriorInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscritos', function (Blueprint $table) {
            $table->boolean('usar_foto_anterior')->nullable();
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
            $table->dropColumn(['usar_foto_anterior']);
        });
    }
}
