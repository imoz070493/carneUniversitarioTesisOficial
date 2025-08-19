<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "name"=>'test ortega',
                "email"=>'test2@test.com',
                "usuario"=>'test2@test.com',
                "password"=>'$2y$10$o3w1.pj17bmSR8SM6oPVp..ARM9WvVQdAnDtWFD0jkhE4XKLF8ydu',
                "estado"=>"activo",
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now(),
            ],
            [
                "name"=>'Irving Ortega',
                "email"=>'imoz070493@gmail.com',
                "usuario"=>'imoz070493@gmail.com',
                "password"=>'$2y$10$G01vOe0nypNzo0dx1DNH5eNsjjoLRBC.t7S8IBVxQ/UzXKD/E7SNO',
                "estado"=>"activo",
                "created_at"=>\Carbon\Carbon::now(),
                "updated_at"=>\Carbon\Carbon::now(),
            ],
        ]);

        $usuario = User::findOrFail(2);
        $usuario->assignRole('administrador');

        DB::unprepared("ALTER TABLE estudiantes AUTO_INCREMENT = 10000;
                        ALTER TABLE periodos_academicos AUTO_INCREMENT = 10000;
                        ALTER TABLE convocatorias AUTO_INCREMENT = 10000;
                        ALTER TABLE matriculas AUTO_INCREMENT = 10000;
                        ALTER TABLE inscritos AUTO_INCREMENT = 10000;");
    }
}