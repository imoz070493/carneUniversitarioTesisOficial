<?php

use App\Inscrito;
use Illuminate\Database\Seeder;

class ComprimirFotoIngresanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Script elaborado para fernando de biblioteca
        $inscritos = Inscrito::join('convocatorias as convocatoria','inscritos.convocatoria_id','=','convocatoria.id')
                                ->join('estudiantes as e','inscritos.estudiante_id','=','e.id')
                                ->whereNull('convocatoria.activo')
                                ->where('e.codigo_estudiante','like','%20251')
                                ->get();

        $from = 'C:\xampp\htdocs\carneUniversitarioTesis\storage\app\public\convocatoria_202501\1_validado';
        $to = 'C:\xampp\htdocs\carneUniversitarioTesis\storage\app\public\convocatoria_202501\3_comprimidos';
        
        $zip = new ZipArchive;
        $zip_name = "Ingresantes 202501 con CODIGO ESTUDIANTE".'.zip';
        
        $path_zip = $to.'/'.$zip_name;
        
        $zip->open($path_zip,ZipArchive::CREATE);

        foreach ($inscritos as $key => $value) {\Log::info($value->foto);
            $zip->addFile($from.'/'.$value->foto,$value->codigo_estudiante.'.jpg');
        }

        $zip->close();
    }
}
