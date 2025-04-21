<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estado extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("estados")->insert(
            [
                'estado_id' => 1,
                'nombre_estado' => 'Nuevo'
            ]
        );
        DB::table("estados")->insert(
            [
                'estado_id' => 2,
                'nombre_estado' => 'En emision'
            ]
        );
        DB::table("estados")->insert(
            [
                'estado_id' => 3,
                'nombre_estado' => 'Finalizado'
            ]
        );
        DB::table("estados")->insert(
            [
                'estado_id' => 4,
                'nombre_estado' => 'Pausado'
            ]
        );
    }
}
