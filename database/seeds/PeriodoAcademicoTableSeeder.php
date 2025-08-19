<?php

use App\Inscrito;
use App\Matricula;
use Illuminate\Database\Seeder;

class PeriodoAcademicoTableSeeder extends Seeder
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
                'fecha_inicio' => \Carbon\Carbon::parse($value['fecha_inicio']),
                'fecha_fin' => \Carbon\Carbon::parse($value['fecha_fin']),
                'estado' => $value['estado'],
                'created_at' => \Carbon\Carbon::parse($value['created_at']),
                'updated_at' => \Carbon\Carbon::parse($value['updated_at']),
                'romano' => $value['romano'],
            ];
            DB::table('periodos_academicos')->insert([$datos]);
            unset($datos);
        }
    }

    public static function data(){
        return [
            [
                "id" =>60,
                "nombre" =>"2023-01",
                "descripcion" =>null,
                "fecha_inicio" =>"2023-04-03",
                "fecha_fin" =>"2023-08-11",
                "estado" =>"Finalizado",
                "created_at" =>"2024-02-13 16:15:22",
                "updated_at" =>"2024-03-04 18:07:44",
                "romano" =>"2023-I"
            ],
            [
                "id" =>61,
                "nombre" =>"2023-02",
                "descripcion" =>null,
                "fecha_inicio" =>"2023-08-20",
                "fecha_fin" =>"2024-01-18",
                "estado" =>"Finalizado",
                "created_at" =>"2024-02-13 16:15:22",
                "updated_at" =>"2024-03-04 18:07:44",
                "romano" =>"2023-II"
            ],
            [
                "id" =>62,
                "nombre" =>"2024-1",
                "descripcion" =>null,
                "fecha_inicio" =>"2024-03-01",
                "fecha_fin" =>"2024-03-30",
                "estado" =>"Finalizado",
                "created_at" =>"2024-02-13 16:15:22",
                "updated_at" =>"2024-03-04 18:07:44",
                "romano" =>"2024-I"
            ],
            [
                "id" =>63,
                "nombre" =>"2024-02",
                "descripcion" =>null,
                "fecha_inicio" =>"2024-08-21",
                "fecha_fin" =>"2024-12-31",
                "estado" =>"Finalizado",
                "created_at" =>"2024-08-21 16:55:22",
                "updated_at" =>"2024-08-21 16:55:22",
                "romano" =>"2024-II"
            ],
            [
                "id" =>64,
                "nombre" =>"2025-01",
                "descripcion" =>null,
                "fecha_inicio" =>"2025-04-01",
                "fecha_fin" =>"2025-05-31",
                "estado" =>"Activo",
                "created_at" =>"2025-01-14 12:39:22",
                "updated_at" =>"2025-01-14 12:39:22",
                "romano" =>"2025-I"
            ]
        ];
    }
}
