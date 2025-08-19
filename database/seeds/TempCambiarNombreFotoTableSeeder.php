<?php

use App\Inscrito;
use Illuminate\Database\Seeder;

class TempCambiarNombreFotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscritos = Inscrito::join('convocatorias as convocatoria','inscritos.convocatoria_id','=','convocatoria.id')
                            ->select(
                                'inscritos.id',
                                'inscritos.foto',
                                'convocatoria.folder'
                            )
                            ->get();

        $from = public_path("\storage/");
        $to = public_path("\storage/reorganizado/");

        $carpetas = [
            '/convocatoria_202301/',
            '/convocatoria_202302/',
            '/convocatoria_202401/',
            '/convocatoria_202402/',
            '/convocatoria_202403/',
            '/convocatoria_202404/',
        ];

        foreach ($carpetas as $key => $value) {
            mkdir($to.$value);
            mkdir($to.$value."1_validado");
            mkdir($to.$value."2_sin_validar");
        }


        foreach ($inscritos as $key => $inscrito) {

            \Log::info('N° DNI: '.$inscrito->dni);
            \Log::info('ID: '.$inscrito->id);
            
            $name_uuid = Str::uuid().'.jpg';
            Inscrito::where('id',$inscrito->id)
                    ->update(['foto' => $name_uuid]);

            // VALIDADO
            if (file_exists($from.$inscrito->folder."/1_validado/$inscrito->foto")){
                copy($from.$inscrito->folder."/1_validado/$inscrito->foto", $to.$inscrito->folder."/1_validado/$name_uuid");
            }
            
            // SIN VALIDAD
            if (file_exists($from.$inscrito->folder."/2_sin_validar/$inscrito->foto")){
                copy($from.$inscrito->folder."/2_sin_validar/$inscrito->foto", $to.$inscrito->folder."/2_sin_validar/$name_uuid");
            }
        }
        \Log::info($inscritos);
        // $imagePath = public_path("\storage/".$folder."/1_validado/".$photo);
    }
}
