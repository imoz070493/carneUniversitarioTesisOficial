<?php

use Illuminate\Database\Seeder;

class TempEstablecerTipoTramiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Establecer Nuevos
        $periodo_academico_id = '10001';

        $nuevos = DB::table('matriculas')
                    ->where('periodo_academico_id',$periodo_academico_id)
                    ->whereNull('tipo_tramite')
                    ->where(function($query){
                        $query->orWhereNull('fecha_expiracion');
                        $query->orWhere('fecha_expiracion','<=','2025-12-03');
                    });
        $cantidad_nuevos =$nuevos->get();
        $nuevos->update(['tipo_tramite'=>'nuevo']);
        \Log::info("nuevos: ".count($cantidad_nuevos));

        // Establecer duplicados
        $duplicados = DB::table('matriculas')
                    ->where('periodo_academico_id',$periodo_academico_id)
                    ->whereNull('tipo_tramite')
                    ->where(function($query){
                        $query->orWhere('fecha_expiracion','>','2025-12-03');
                    });
        $cantidad_duplicados = $duplicados->get();
        $duplicados->update(['tipo_tramite'=>'duplicado']);
        \Log::info("duplicados: ".count($cantidad_duplicados));
    }
}
