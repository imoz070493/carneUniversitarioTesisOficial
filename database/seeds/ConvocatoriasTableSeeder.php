<?php

use Illuminate\Database\Seeder;

class ConvocatoriasTableSeeder extends Seeder
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
                'nombre' => $value['nombre'],
                'descripcion' => $value['descripcion'],
                'fecha_inicio' => $value['fecha_inicio']?\Carbon\Carbon::parse($value['fecha_inicio']):null,
                'fecha_fin' => $value['fecha_fin']?\Carbon\Carbon::parse($value['fecha_fin']):null,
                'activo' => $value['activo']?\Carbon\Carbon::parse($value['activo']):null,
                'created_at' => $value['created_at']?\Carbon\Carbon::parse($value['created_at']):null,
                'updated_at' => $value['updated_at']?\Carbon\Carbon::parse($value['updated_at']):null,
                'folder' => $value['folder'],
            ];
            DB::table('convocatorias')->insert([$datos]);
            unset($datos);
        }
    }

    public static function data(){
        // Ruta al archivo JSON
        $json = File::get(database_path('data/convocatorias.json'));

        // Convertir en array
        return json_decode($json, true);
    }
}
