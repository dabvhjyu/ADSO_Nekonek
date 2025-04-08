<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("usuarios")->insert(
            [
                'id_usuario' => 1,
                'rol_id_fk' => 1,
                'nombre' => 'Alberto Admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('123456789'),
            ]
        );

        DB::table("usuarios")->insert(
            [
                'id_usuario' => 2,
                'nombre' => 'Usurero Usuario',
                'rol_id_fk' => 2,
                'email' => 'usuario@gmail.com',
                'password' => Hash::make('123456789'),
            ]
        
        );
    }
}
