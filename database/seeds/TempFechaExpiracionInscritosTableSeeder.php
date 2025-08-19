<?php

use Illuminate\Database\Seeder;

class TempFechaExpiracionInscritosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = static::data()['Hoja1'];
        $datos = [];
        foreach ($data as $key => $value) {
            DB::table('inscritos')
                        ->where('codigo_estudiante',$value['codigo_estudiante'])
                        ->where('convocatoria_id',$value['convocatoria_id'])
                        ->update(['fecha_expiracion'=>\Carbon\Carbon::parse($value['fecha_expiracion'])]);

            // unset($datos);
        }
    }

    public static function data(){
        return [
            "Hoja1" => [
                [
                    "codigo_estudiante" => "1013120202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006820182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102620152",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101020231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009020202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101820231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004620172",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106820201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010820212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008120211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101820131",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004220221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013820202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110520202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008920212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107720201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102720152",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000820192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015020202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108220182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004020232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1120120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1120320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1120020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1120420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1016020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1015320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011320201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008020221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012520201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000520221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001620211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004320211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009720201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005320202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004620191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009020221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008420221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005320191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010520202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001920211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104620231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011220231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011420231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002220231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002920211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009620202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002820211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007020221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002020221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002520172",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1119820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006720201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010320211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1120220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007220201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011220192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009120192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008120221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007520221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000620221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007020202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000320201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000220201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1013120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000820161",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007420221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007520192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011520192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002120211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003220152",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002020212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007920212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009020212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012020182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012920201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000520202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011020201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002220211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007620192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006520192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004820201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005720201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009620231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004820202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007120211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110720182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014220202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001720202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007020201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002220202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001920172",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004020212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010520212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007120192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005420201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001420192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003520192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003420231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003920192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003920212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004320172",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000520192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010620212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1120520211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112620191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002420192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003020192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008820202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004720201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108320201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1014720202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1026720191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008620202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009520232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007320211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009120211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000720192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002020192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113820211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103220211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002720202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006220212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006720181",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001620221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111920192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110120192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003120202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003720232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008220202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000620202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004620202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006020221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000320221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011020212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000720202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006120162",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001820201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002820201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007420142",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115020211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000520201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010820202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110620211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000420201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111220211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101620221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000820212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113720211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006420192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1011120212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010620231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003120232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104020212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110820192",
                    "fecha_expiracion" => "29-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103320211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1008020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006420221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006220221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1009120202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012120202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106020182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1001220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010620202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1002320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1118920211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101820221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102520201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100620211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106920221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109820211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112720202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117420211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1117220211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112020202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104720192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105320182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111320202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110420212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1010920202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005720221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105320201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104720211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112220181",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106520221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101520132",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101020221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115920202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107920221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112120202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110520192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102320181",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1113020201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109020202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108720192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108620212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104020201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101720201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110020192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107820192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106020192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1004920231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111720232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108120232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102220212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115620211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110820231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109220212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1114520202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105220202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101020202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111720191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100120192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107820212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1007720192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109620191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110420182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1003920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116820211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1000920152",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107720212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107820221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101620202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106020211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "0000041754",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006320192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100120232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109520191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006020202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115420211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107320231",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111920212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109020192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108320221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109420201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109420211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111420212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107720211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107020232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108820211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111120192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109820192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109420192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101520201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112420211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100520201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100120211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101620211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1108920211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1005620191",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102620192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115820211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112520211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100120222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103520221",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101420162",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115320202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100220202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100720201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101220081",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115720211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102520192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101120202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1110320211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101020201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101220201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112220182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106720202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1105820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1012520202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111820211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103020192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104120201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101820201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109720211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101920211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103220201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103920192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100420081",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104220212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101920201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112320211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101320201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103420201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104720222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103620212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107320202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106220202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1006520211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109120211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1101320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107420222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102020192",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104820222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106220222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1115520211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107920211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1116220211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103820212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1106620232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109420212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1109120202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1107520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103620182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1102920201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1104320232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100220201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1100320182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1112420202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103520201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1103020201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "3"
                ],
                [
                    "codigo_estudiante" => "1111620222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102020161",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106920192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106620221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005920202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009420202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003020202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1027420191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002520192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007320192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1026620191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002520211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1118420211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008920202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1011020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1114020211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111520202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105320211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108420211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1011420212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009820202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004020232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007920192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105820202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008320211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107120201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1012220201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005620182",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109820201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007720202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004220191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1026520191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102820221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007620162",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009220201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1012120182",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010420201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007120221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006920221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111120201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007620221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000520211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1011320212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110520182",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104520221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008620212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007320221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1013220201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009220192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102220202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101820202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002620221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002520221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1115220202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1011220212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1014120202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001920202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006120202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010520192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000120212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003320221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108520212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1012220192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113920211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104620212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000920212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001020212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007020172",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008320201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102120212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107820201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102920211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100420221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107020221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1025520191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008520221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112920212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010820181",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002220212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113520201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004020202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006420201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005820222",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004120221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106120201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006820202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109120212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008120192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111720211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113620202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010320212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010420202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1012120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003220202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110820212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113120201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1027220191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109820212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112720201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005820212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009720211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103620211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001320192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111920211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007520212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005820232",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006820212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1013220202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000520212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107620212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106120221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107420221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003220201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002120201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104520211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001520221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1011820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003420202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105020211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110120211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004520221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109920211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1117120211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1003820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000220212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107620201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105420201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105020201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108220201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107320201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110020212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105520211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109120221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108620202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105720211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110720202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007220212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008620221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112120211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102820212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008220222",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005020221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1013520202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113620211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100120212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100220212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006520212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002920222",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112720211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002420202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1000420212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006420222",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002520201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1004220201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108420212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1014420202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1014320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1009220202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1012320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1011020202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103820221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001020202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113920202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107520212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1001720201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1007620212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1005620221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1008720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103920202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108820202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111020212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107120221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113220211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1010720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107220191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101920221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107220201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107420201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109620201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104920221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105320212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1115920202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100320212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112020111",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107920222",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102020212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111720202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1114920202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100620212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105920202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104620202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102920221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106620212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105520232",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101020212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104720201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106120211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105720232",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111520201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110020201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108220211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106520202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103820202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107520202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107420211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1110820201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107520221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104020211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111720201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112020211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101820192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100920192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108020221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113420201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109920201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102020202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101120212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002320201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1006120221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109020221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1120820211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103920231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1114720211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112620202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1112020212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109020212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109020201",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111120202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108520231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1113520202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105420211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107520211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107120211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105220211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109320221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101320221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108620221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109520211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106320211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102120221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108820221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1114120202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106320202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107620221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104920211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109420221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102320221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107820231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107620202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107020211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106220211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105620211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103820211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109220211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105820211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104320211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108320211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109720202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1108420221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109020211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111720212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111820212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1120220211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1107620211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102220191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1102220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1101620231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104720221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1104220221",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109820191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100220231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1106720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1120120211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1109420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100320231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1100720222",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1002020191",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1111620211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103120192",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1103120231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "4"
                ],
                [
                    "codigo_estudiante" => "1105120212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117820211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101420202",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011320241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006320211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012820201",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010320201",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117620241",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102320212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105720202",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001420212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010520201",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119820211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000820211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112120201",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111620201",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009220212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003720232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006120231",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1007920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003120221",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011620212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002620211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010720202",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000420231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010320192",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111020211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1008920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010620241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102020222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002020212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004120211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117520241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1121120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1005820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1008420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1007620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100920212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119020211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014920202",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1005920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1008320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1015820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110320212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009320211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106020221",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000220221",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1007920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110720241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1007720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010720212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1007820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1014420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1008720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1008020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002720221",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1005520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1009620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1010920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1005720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1008620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1000820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1016220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1017720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104020222",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1004820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1012720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1007020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1005420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103520222",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1013020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105420231",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103020231",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106720222",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1003420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001120231",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1002120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1007420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1011320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102820201",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006920201",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1001620192",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1024720191",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1121320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119420211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1117020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006220202",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1121020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1116020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1120420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105120211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110120202",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106320212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101220212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101520212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100520221",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101420212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111920191",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108320212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119220241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104320221",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1005220231",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006420211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106420221",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106120231",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110620212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1115020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102320181",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100420212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1114520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100520231",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103820212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107020212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110520212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1119120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103420192",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100520222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112120212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112220202",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107320222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104820212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105220212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107320202",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1006720222",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108020211",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104520212",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1118820241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1121220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1102120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1101920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1106820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113520242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109120242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1100720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1103920242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1109420242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108020242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1107720242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108620242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1105820242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1113320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1108220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1111220242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1112320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1104320242",
                    "fecha_expiracion" => "28-10-2025",
                    "convocatoria_id" => "5"
                ],
                [
                    "codigo_estudiante" => "1110020231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003620221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100120221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1113320202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1010920192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000720221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103320231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002720201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1113920211",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100920202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001720212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003020221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009120221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002420152",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1104420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103120212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110820202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1118520211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105720221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1117020211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1114420211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106820212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110820211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004320221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008020201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003520162",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003820192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004320212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1114120211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002920221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1011120241",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109520202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1011020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1013620202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005320221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008820221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003620201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111920202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1120320211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1028020191",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102320211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105620221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008220192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102020221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1116120241",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009020222",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1112220182",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100620201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004220211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105920231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1014620202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000120221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108120211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007020212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001320221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007020222",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007620211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009920212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1120420211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105720192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1010020211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1011920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102220221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006620212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004820231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006620201",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008920221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001520201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101920202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005220202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1120620211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111420211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1026020191",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1112020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008320182",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001620202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106820202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1113720202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001920212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007120212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101720211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1107820211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106920212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101420231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004520212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003020182",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108120221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1115920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1120720211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111620202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109920222",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1104220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106420211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109920231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109520231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1112020201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106520212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108820212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102420211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103220212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106620192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008620192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1107620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1107420192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105820192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103720221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004220212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106620232",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1014820202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1012220202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006720202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101920231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1012020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000620192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111820192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006820201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1011120231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002620231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1010820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1117620211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100720231",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1011120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002620202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001420211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105820182",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005820231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007120241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110120201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1012820202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009820182",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008920201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005420181",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004620201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1010620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1011520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108420181",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108820201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100320201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1010320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100920201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105920192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1107420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002120202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002020231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000420221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004920221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1010720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106320201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007320212",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001120212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006920211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1104920231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110320231",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009720202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005720202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006920212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003620211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007920211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1000220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102420212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1119920211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1007820202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1010720211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101520221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106220221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003720211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108520222",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009720212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109620211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1008220212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1004220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1005020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1119320211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006420241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1107320221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1003520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106420212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1114920211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1006920241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109120212",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109220201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109620212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1107220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101620222",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101220191",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111820201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1113420211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102320232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002620192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1002120192",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1107120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108020201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100620211",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1104020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110520211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1117320211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103120232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1014420202",
                    "fecha_expiracion" => "26-08-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1108420232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1104620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1111920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1104820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1109620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1110020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1104720232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105620202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1106520232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1120020241",
                    "fecha_expiracion" => "24-05-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101720202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1102420202",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103620232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1103920232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105220232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100920211",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1001220212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009320221",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1009320212",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1100420201",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1105020232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ],
                [
                    "codigo_estudiante" => "1101820232",
                    "fecha_expiracion" => "03-12-2025",
                    "convocatoria_id" => "6"
                ]
            ]
        ];
    }
}
