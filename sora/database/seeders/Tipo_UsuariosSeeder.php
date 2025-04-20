<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("tipo_usuarios")->insert(
            [
                'rol_id' => 1,
                'rol' => 'Administrador'
            ]
        );

        DB::table("tipo_usuarios")->insert(
            [
                'rol_id' => 2,
                'rol' => 'lector'
            ]
        ); 

        DB::table("tipo_usuarios")->insert(
            [
                'rol_id' => 3,
                'rol' => 'editor'
            ]
        ); 
    }
}
