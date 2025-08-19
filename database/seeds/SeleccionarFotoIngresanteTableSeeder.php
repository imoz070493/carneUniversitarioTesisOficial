<?php

use App\Inscrito;
use Illuminate\Database\Seeder;

class SeleccionarFotoIngresanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscritos = Inscrito::where('convocatoria_id',2)
                                ->whereNull('fecha_anulado')
                                ->where('codigo_estudiante','like','%20232')
                                ->get();

        $from = 'C:\xampp\htdocs\carneUniversitario\public\storage\carne_universitario';
        $to = 'C:\xampp\htdocs\carneUniversitario\public\storage\ingresantes';
        // copy($from."/01_76268466".".jpg", $to.'/1_76268466'.".jpg");
        foreach ($inscritos as $key => $inscrito) {
            \Log::info('Codigo: '.$inscrito->codigo_estudiante);
            \Log::info('N° DNI: '.$inscrito->dni);
            \Log::info('ID: '.$inscrito->id);

            // Inscrito::validarCredencial('dni', $inscrito->dni, $inscrito->id);
            copy($from."/1_".$inscrito->dni.".jpg", $to.'/'.$inscrito->codigo_estudiante.".jpg");
        }
    }
}
