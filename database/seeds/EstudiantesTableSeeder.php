<?php

use Illuminate\Database\Seeder;

class EstudiantesTableSeeder extends Seeder
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
                'facultad' => $value['facultad'],
                'escuela_profesional' => $value['escuela_profesional'],
                'dni' => $value['dni'],
                'codigo_estudiante' => $value['codigo_estudiante'],
                'apellido_paterno' => $value['apellido_paterno'],
                'apellido_materno' => $value['apellido_materno'],
                'nombres' => $value['nombres'],
                'sexo' => $value['sexo'],
                'periodo_primera_matricula' => $value['periodo_primera_matricula'],
                'correo_institucional' => $value['codigo_estudiante']."@unajma.edu.pe",
                'correo_personal' => $value['correo_personal'],
                'telefono1' => $value['telefono1'],
                'telefono2' => $value['telefono2'],
                'observacion' => $value['observacion'],
                'created_at' => \Carbon\Carbon::parse($value['created_at']),
                'updated_at' => \Carbon\Carbon::parse($value['updated_at']),
            ];

            $datos_usuarios = [
                'name' => $value['nombres']." ".$value['apellido_paterno']." ".$value['apellido_materno'],
                'email' => $value['codigo_estudiante']."@unajma.edu.pe",
                'usuario' => $value['codigo_estudiante'],
                'password' => bcrypt($value['dni']),
                'estado' => "activo",
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'estudiante_id' => $value['id'],
            ];

            DB::table('estudiantes')->insert([$datos]);
            DB::table('users')->insert([$datos_usuarios]);

            $usuario = \App\User::where('estudiante_id',$value['id'])->first();
            $usuario->assignRole('estudiante');

            unset($datos);
            unset($datos_usuarios);
        }
    }

    public static function data(){
        // Ruta al archivo JSON
        $json = File::get(database_path('data/estudiantes.json'));

        // Convertir en array
        return json_decode($json, true);
    }
}