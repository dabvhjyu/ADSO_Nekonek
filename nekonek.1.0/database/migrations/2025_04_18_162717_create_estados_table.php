<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            // Clave primaria autoincremental (BEST PRACTICE: usar 'id' en Laravel)
            $table->id('estado_id'); // Equivalente a bigIncrements('estado_id')
            
            // Campo para el nombre (único y no nulo)
            $table->string('nombre_estado', 50)->unique()->comment('Nombre descriptivo del estado');
            
            // Timestamps automáticos
            $table->timestamps();
            
            // SoftDeletes opcional (si necesitas borrado lógico)
            // $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
};
