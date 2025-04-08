<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabla para almacenar elementos en caché
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Clave única del elemento en caché
            $table->mediumText('value'); // Valor almacenado en caché
            $table->integer('expiration')->index(); // Tiempo de expiración (timestamp Unix)
        });

        // Tabla para gestionar bloqueos de caché
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Clave única del bloqueo
            $table->string('owner')->index(); // Identificador del propietario del bloqueo
            $table->integer('expiration'); // Tiempo de expiración del bloqueo (timestamp Unix)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
    }
};

