<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVistaEstudiantesTipo1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE VIEW 
                        vista_estudiantes AS 
                        SELECT 
                            id,
                            apellido_paterno,
                            apellido_materno,
                            nombres,
                            codigo_estudiante,
                            CONCAT(apellido_paterno,' ',
                                    apellido_materno,' ',
                                    nombres) as full_name
                        FROM estudiantes;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP VIEW vista_estudiantes");
    }
}
