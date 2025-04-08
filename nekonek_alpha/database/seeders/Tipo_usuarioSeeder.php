<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("tipo_usuario")->insert(
            [
                'rol_id' => 1,
                'rel' => 'Administrador'
            ]
        );

        DB::table("tipo_usuario")->insert(
            [
                'rol_id' => 2,
                'rel' => 'lector'
            ]
        );
    }
}
