
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrearSeriesTable extends Migration
{
    public function up()
    {
        Schema::create('crear_series', function (Blueprint $table) {
            // Estructura base mantenida
            $table->id('seriecreada_id');
            $table->string('titulo', 255);
            $table->string('subtitulo', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('miniatura_cuadrada', 255)->nullable();
            $table->string('miniatura_vertical', 255)->nullable();
            
            // CAMPO MODIFICADO (Reemplazo de genero_1_id/genero_2_id)
            $table->unsignedBigInteger('genero_id')->nullable();
            
            // NUEVO CAMPO AÑADIDO
            $table->unsignedBigInteger('estado_id');
            
    
            // CLAVES FORÁNEAS ACTUALIZADAS
            $table->foreign('genero_id')
                  ->references('genero_id')
                  ->on('generos')
                  ->onDelete('set null'); // Cambiado a set null para evitar pérdida de datos
    
            $table->foreign('estado_id')
                  ->references('estado_id')
                  ->on('estados') // Nota: pluralizado correctamente
                  ->onDelete('restrict'); // Buenas prácticas para tablas maestras
        });
    }

    public function down()
    {
        Schema::dropIfExists('crear_series');
    }
}
