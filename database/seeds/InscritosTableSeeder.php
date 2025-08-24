<?php

use Illuminate\Database\Seeder;

class InscritosTableSeeder extends Seeder
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
                'apellido_paterno_validado' => $value['apellido_paterno_validado'],
                'apellido_materno_validado' => $value['apellido_materno_validado'],
                'nombres_validado' => $value['nombres_validado'],
                'foto' => $value['foto'],
                'foto_validado' => $value['foto_validado'],
                'voucher_validado' => $value['voucher_validado'],
                'duplicado' => $value['duplicado'],
                'credencial_validado' => $value['credencial_validado'],
                'fecha_anulado' => $value['fecha_anulado']?\Carbon\Carbon::parse($value['fecha_anulado']):null,
                'observacion' => $value['observacion'],
                'created_at' => \Carbon\Carbon::parse($value['created_at']),
                'updated_at' => \Carbon\Carbon::parse($value['updated_at']),
                'convocatoria_id' => $value['convocatoria_id'],
                'estudiante_id' => $value['estudiante_id'],
                'numero_recibo' => $value['numero_recibo'],
                'usar_foto_anterior' => $value['usar_foto_anterior'],
                'fecha_expiracion' => $value['fecha_expiracion']?\Carbon\Carbon::parse($value['fecha_expiracion']):null,
                'fecha_inicio_tramite' => $value['fecha_inicio_tramite']?\Carbon\Carbon::parse($value['fecha_inicio_tramite']):null,
                'fecha_fin_tramite' => $value['fecha_fin_tramite']?\Carbon\Carbon::parse($value['fecha_fin_tramite']):null,
                'usuario_create_id' => $value['usuario_create_id'],
                'usuario_update_id' => $value['usuario_update_id'],
                'fecha_inicio_edicion' => $value['fecha_inicio_edicion']?\Carbon\Carbon::parse($value['fecha_inicio_edicion']):null,
                'fecha_fin_edicion' => $value['fecha_fin_edicion']?\Carbon\Carbon::parse($value['fecha_fin_edicion']):null,
            ];
            DB::table('inscritos')->insert([$datos]);
            unset($datos);
        }
    }

    public static function data(){
        // Ruta al archivo JSON
        $json = File::get(database_path('data/incritos TO 2025-I.json'));

        // Convertir en array
        return json_decode($json, true);
    }
}
