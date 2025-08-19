<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            [
                "ruc"=>'20495540952',
                "razon_social"=>'NUTRIENTES DE EXPORTACION PERU',
                "nombre_comercial"=>'NUTRIENTES DE EXPORTACION PERU',
                "direccion"=>'AV. AVENIDA PERU NRO. 185',
                "departamento"=>'Apurimac',
                "provincia"=>'Andahuaylas',
                "distrito"=>'Andahuaylas',
                "codpais"=>'PE',
                "ubigeo"=>'030705',
                "telefono"=>'99999999',
                "correo"=>'empresa@gmail.com',
                "usuario"=>'usario',
                "clave"=>'calve',
                "firma"=>'',
                "tipo"=>'Produccion',
                "estado"=>'activo',
                "restringir_stock"=>1,
            ],
            // [
            //     "ruc"=>'20100066603',
            //     "razon_social"=>'CREVPERU S.A.',
            //     "nombre_comercial"=>'CREV PERU COMERCIAL',
            //     "direccion"=>'PSJ HUAMPANI',
            //     "departamento"=>'LIMA2',
            //     "provincia"=>'LIMA',
            //     "distrito"=>'CHACLACAYO',
            //     "codpais"=>'PE',
            //     "ubigeo"=>'070104',
            //     "telefono"=>'991441592',
            //     "correo"=>'webmaster@crevperu.com',
            //     "usuario"=>'MODDATOS',
            //     "clave"=>'moddatos',
            //     "firma"=>'--',
            //     // "tipo"=>'1',
            //     "tipo"=>'produccion',
            //     "estado"=>'inactivo'
            // ]
        ]);
    }
}
