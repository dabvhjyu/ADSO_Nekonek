<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class generosSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            [
                'genero_id' => 1,
                'nombre_genero' => 'Acción'
            ],
            [
                'genero_id' => 2,
                'nombre_genero' => 'Aventura'
            ],
            [
                'genero_id' => 3,
                'nombre_genero' => 'Drama'
            ],
            [
                'genero_id' => 4,
                'nombre_genero' => 'Harem'
            ],
            [
                'genero_id' => 5,
                'nombre_genero' => 'Romance'
            ],
            [
                'genero_id' => 6,
                'nombre_genero' => 'Seinen'
            ],
            [
                'genero_id' => 7,
                'nombre_genero' => 'Shojo'
            ],
            [
                'genero_id' => 8,
                'nombre_genero' => 'Shonen'
            ],
            [
                'genero_id' => 9,
                'nombre_genero' => 'Terror'
            ]
        ]);
    }
}
