<?php

use Illuminate\Database\Seeder;

class MatriculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = static::data();
        $datos = [];
        foreach ($data as $key => $value) {
            $datos = [
                'id' => $value['id'],
                'codigo_estudiante' => $value['codigo_estudiante'],
                'created_at' => \Carbon\Carbon::parse($value['created_at']),
                'updated_at' => \Carbon\Carbon::parse($value['updated_at']),
                'estudiante_id' => $value['estudiante_id'],
                'periodo_academico_id' => $value['periodo_academico_id'],
                'tipo_tramite' => $value['tipo_tramite'],
                'fecha_expiracion' => $value['fecha_expiracion']?\Carbon\Carbon::parse($value['fecha_expiracion']):null,
            ];
            DB::table('matriculas')->insert([$datos]);
            unset($datos);
        }
    }

    public static function data(){
        // Ruta al archivo JSON
        $json = File::get(database_path('data/matriculas.json'));

        // Convertir en array
        return json_decode($json, true);   
    }
}
