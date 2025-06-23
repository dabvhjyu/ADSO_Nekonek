<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubirCapituloTable extends Migration
{
    public function up()
    {
        Schema::create('subir_capitulo', function (Blueprint $table) {
            $table->id('id_capitulo'); // Equivalente a INT AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('seriecreada_id'); // Clave foránea (BIGINT UNSIGNED)
            $table->integer('numero'); // INT NOT NULL
            $table->string('titulo', 255); // VARCHAR(255) NOT NULL
            $table->string('imagen_previa', 255)->nullable(); // VARCHAR(255) opcional
            $table->string('archivo', 255); // VARCHAR(255) NOT NULL
            $table->unsignedBigInteger('tipos_contenido_id'); // Clave foránea (BIGINT UNSIGNED)
            $table->boolean('comentarios')->default(true); // BOOLEAN DEFAULT TRUE
            $table->dateTime('publicacion'); // DATETIME NOT NULL
            $table->dateTime('creacion_fecha')->default(now()); // DATETIME DEFAULT CURRENT_TIMESTAMP
            $table->dateTime('actualizacion_fecha')->default(now())->useCurrentOnUpdate(); // DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            $table->timestamps(); // Opcional: agrega created_at y updated_at

            // Definir claves foráneas
            $table->foreign('seriecreada_id')
                ->references('seriecreada_id')->on('crear_series')
                ->onDelete('cascade');

            $table->foreign('tipos_contenido_id')
                ->references('contenido_id')->on('contenido')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subir_capitulo');
    }
}

