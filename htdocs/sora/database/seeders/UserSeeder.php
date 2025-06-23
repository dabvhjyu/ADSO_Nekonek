<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table("users")->insert(
            [
                'id' => 2,
                'name' => 'edit editor',
                'rol_id_fk' => 3,
                'email' => 'editor@gmail.com',
                'password' => Hash::make('123456789'),
            ]
        );

        DB::table("users")->insert(
            [
                'id' => 1,
                'name' => 'armando administrador',
                'rol_id_fk' => 1,
                'email' => 'administrador@gmail.com',
                'password' => Hash::make('123456789'),
            ]
        );

        DB::table("users")->insert(
            [
                'id' => 3,
                'name' => 'lectino lector',
                'rol_id_fk' => 2,
                'email' => 'lector@gmail.com',
                'password' => Hash::make('123456789'),
            ]
        );

        
    }
}
