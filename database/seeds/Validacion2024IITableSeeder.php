<?php

use Illuminate\Database\Seeder;

class Validacion2024IITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscritos = \App\Inscrito::join('convocatorias as convocatoria','inscritos.convocatoria_id','=','convocatoria.id')
                            // ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                            ->select(
                                'inscritos.id',
                                'inscritos.codigo_estudiante',
                                'inscritos.foto'
                                /* ,
                                'e.escuela_profesional',
                                'e.dni as numero_documento',
                                'e.dni',
                                'e.codigo_estudiante' */
                            )
                            ->whereNull('convocatoria.activo')
                            ->where('inscritos.codigo_estudiante','not like','%20242')
                            ->get();

        foreach ($inscritos as $key => $value) {
            $inscrito = \App\Inscrito::where('codigo_estudiante',$value->codigo_estudiante)
                                        ->where('convocatoria_id','2')
                                        ->get();
                                        // \Log::info($inscrito);
            if(count($inscrito)>0){
                \App\Inscrito::where('codigo_estudiante',$value->codigo_estudiante)
                                        ->where('convocatoria_id','5')
                                        ->update(['convocatoria_id'=>'6']);

                // Ruta del archivo original
                $archivo_origen = public_path("\storage/convocatoria_202403/1_validado/".$inscrito->foto);

                // Ruta del nuevo destino
                $archivo_destino = public_path("\storage/convocatoria_202404/1_validado/".$inscrito->foto);

                // Mover y reemplazar el archivo
                if (rename($archivo_origen, $archivo_destino)) {
                    \Log::info("Copiado");
                } else {
                    \Log::info("Sin copiar");
                }

                \Log::info("Carné vigente: ".$value->codigo_estudiante);
            }
        }
        
        \Log::info(count($inscritos));
    }
}
