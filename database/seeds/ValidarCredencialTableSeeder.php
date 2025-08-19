<?php

use App\Convocatoria;
use App\Inscrito;
use Illuminate\Database\Seeder;

class ValidarCredencialTableSeeder extends Seeder
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
                                    'inscritos.credencial_validado'
                                )
                                ->whereNull('convocatoria.activo')
                                ->where('inscritos.credencial_validado','!=','validado')
                                ->get();

        foreach ($inscritos as $key => $inscrito) {
            \Log::info('Key: '.$key);
            \Log::info('N° DNI: '.$inscrito->dni);
            \Log::info('ID: '.$inscrito->id);

            if($inscrito->credencial_validado!='validado')
                Inscrito::validarCredencial('dni', $inscrito->dni, $inscrito->id);
        }

        $folder = $convocatoria_actual->folder;
        foreach ($inscritos as $key => $value) {
            $resolucion_dpi = Inscrito::getDpiV2($folder, "1_validado", $value->foto);
            $resolucion = Inscrito::getImageSize($folder, $value->foto);

            \Log::info("DNI---------".$value->dni);

            if($resolucion['width']==240 && $resolucion['height']==288)
                \Log::info("---------");
            else
                \Log::info("Dimensiones Incorrectas: ".$resolucion['width']."x".$resolucion['height']);

            if($resolucion_dpi['horizontal_dpi']==300 && $resolucion_dpi['vertical_dpi']==300)
                \Log::info("---------");
            else
                \Log::info("Resolucion Incorrectas: ".$resolucion_dpi['horizontal_dpi']."-".$resolucion_dpi['yDpi']);
        }

    }
}
