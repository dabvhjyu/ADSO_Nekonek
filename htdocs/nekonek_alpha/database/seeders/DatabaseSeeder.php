<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Tipo_usuarioSeeder::class,
            UsuariosSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\usuarios::factory(10)->create();
        // \App\Models\tipo_usuario::factory(10)->create();
    }
}
