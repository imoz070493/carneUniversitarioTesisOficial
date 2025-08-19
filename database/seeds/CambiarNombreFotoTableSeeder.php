<?php

use Illuminate\Database\Seeder;

use App\Inscrito;

class CambiarNombreFotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscritos = Inscrito::all();

        $from = 'C:\xampp\htdocs\carneUniversitario\public\storage\carne_universitario';
        $to = 'C:\xampp\htdocs\carneUniversitario\public\storage\carne_universitario_oficial';
        // copy($from."/01_76268466".".jpg", $to.'/1_76268466'.".jpg");
        foreach ($inscritos as $key => $inscrito) {
            \Log::info('N° DNI: '.$inscrito->dni);
            \Log::info('ID: '.$inscrito->id);

            // Inscrito::validarCredencial('dni', $inscrito->dni, $inscrito->id);
            copy($from."/01_".$inscrito->dni.".jpg", $to.'/1_'.$inscrito->dni.".jpg");
        }
    }
}
