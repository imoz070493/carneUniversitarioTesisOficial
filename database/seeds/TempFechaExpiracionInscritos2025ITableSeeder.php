<?php

use Illuminate\Database\Seeder;

class TempFechaExpiracionInscritos2025ITableSeeder extends Seeder
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
            $fecha_expiracion = $value['fecha_expiracion']?\Carbon\Carbon::parse($value['fecha_expiracion']):null;
            DB::table('inscritos')
                        ->where('codigo_estudiante',$value['codigo_estudiante'])
                        ->where('convocatoria_id','10000')
                        ->update(['fecha_expiracion' => $fecha_expiracion]);

            // unset($datos);
        }
    }

    public static function data(){
        // Ruta al archivo JSON
        $json = File::get(database_path('data/fecha_expiracion_inscritos_2025_I.json'));

        // Convertir en array
        return json_decode($json, true);
    }
}
