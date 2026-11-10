<?php

use Illuminate\Database\Seeder;

class TempPagosInscritos2026IVTableSeeder extends Seeder
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
            $voucher_validado = $value['voucher_validado'];
            $numero_recibo = $value['numero_recibo'];
            $fecha_pago = $value['fecha_pago']?\Carbon\Carbon::parse($value['fecha_pago']):null;
            DB::table('inscritos')
                        ->where('codigo_estudiante',$value['codigo_estudiante'])
                        ->where('convocatoria_id','10007')
                        ->update(['voucher_validado' => $voucher_validado,
                                    'numero_recibo' => $numero_recibo,
                                    'fecha_pago' => $fecha_pago]);

            // unset($datos);
        }
    }

    public static function data(){
        // Ruta al archivo JSON
        $json = File::get(database_path('data/pagos_inscritos_2026_IV2.json'));

        // Convertir en array
        return json_decode($json, true);
    }
}
