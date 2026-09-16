<?php

use App\Convocatoria;
use App\Inscrito;
use Illuminate\Database\Seeder;

class ValidacionMasivaFotografiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $convocatoria_actual = Convocatoria::whereNull('activo')->first();

        $inscritos = Inscrito::join('convocatorias as convocatoria','inscritos.convocatoria_id','=','convocatoria.id')
                                ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                                ->select(
                                    'inscritos.id',
                                    'e.dni',
                                    'inscritos.foto',
                                    'inscritos.foto_validado'
                                )
                                ->whereNull('convocatoria.activo')
                                ->where('inscritos.foto_validado',false)
                                ->get();

        $folder = $convocatoria_actual->folder;
        foreach ($inscritos as $key => $value) {\Log::info($value->dni);
            $from = public_path("storage/".$folder."/2_sin_validar/".$value->foto);
            $to = public_path("storage/".$folder."/5_temps/".$value->foto);


            \Log::info($from.$to);
            copy($from, $to);

            $valores = Inscrito::validarImagenUrl($value->foto,$folder);
            if($valores["validado"]){
                $official_to = public_path("storage/".$folder."/1_validado/".$value->foto);
                copy($from, $official_to);
                Inscrito::where('id',$value->id)->update(['foto_validado'=>true]);
            }
            \Log::info($valores["validado"]);
            if($key==1)
                break;
        }
    }
}
