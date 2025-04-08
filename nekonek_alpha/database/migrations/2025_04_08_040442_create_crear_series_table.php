<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrearSeriesTable extends Migration
{
    public function up()
    {
        Schema::create('crear_series', function (Blueprint $table) {
            $table->id('seriecreada_id'); // Equivalente a INT AUTO_INCREMENT PRIMARY KEY
            $table->string('titulo', 255); // VARCHAR(255) NOT NULL
            $table->string('subtitulo', 255)->nullable(); // VARCHAR(255) opcional
            $table->unsignedBigInteger('genero_1_id'); // Clave foránea (BIGINT UNSIGNED)
            $table->unsignedBigInteger('genero_2_id')->nullable(); // Clave foránea opcional
            $table->text('descripcion')->nullable(); // TEXT opcional
            $table->string('miniatura_cuadrada', 255)->nullable(); // VARCHAR(255) opcional
            $table->string('miniatura_vertical', 255)->nullable(); // VARCHAR(255) opcional
            $table->dateTime('fecha_creacion')->default(now()); // DATETIME DEFAULT CURRENT_TIMESTAMP
            $table->dateTime('ultima_actualizacion')->default(now())->useCurrentOnUpdate(); // DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            $table->timestamps(); // Opcional: agrega created_at y updated_at

            // Definir claves foráneas
            $table->foreign('genero_1_id')
                ->references('genero_id')->on('generos')
                ->onDelete('cascade');

            $table->foreign('genero_2_id')
                ->references('genero_id')->on('generos')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('crear_series');
    }
}
