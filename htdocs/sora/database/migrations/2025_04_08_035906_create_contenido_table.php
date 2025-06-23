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
        Schema::create('contenido', function (Blueprint $table) {
            $table->id('contenido_id'); // Equivalente a INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nombre_contenido', 100)->unique(); // VARCHAR(100) NOT NULL UNIQUE
            $table->timestamps(); // Opcional: agrega created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contenido');
    }
};
