<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ConfigTableSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(EstudiantesTableSeeder::class);
        $this->call(PeriodoAcademicoTableSeeder::class);
        $this->call(ConvocatoriasTableSeeder::class);
        $this->call(MatriculasTableSeeder::class);
        $this->call(InscritosTableSeeder::class);

    }
}
