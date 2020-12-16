<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            'nombre' => 'Profesional de proyectos - Desarrollador'
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Gerente estrategico'
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Auxiliar administrativo'
        ]);
        DB::table('areas')->insert([
            'nombre' => 'Produccion'
        ]);
        DB::table('areas')->insert([
            'nombre' => 'Administrativo'
        ]);
    }
}
