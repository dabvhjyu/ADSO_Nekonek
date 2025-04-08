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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->unsignedBigInteger('rol_id_fk');
            $table->string('nombre', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('telefono', 15)->nullable();
            $table->string('apodo', 50)->nullable();
            $table->string('fondo', 255)->nullable();
            $table->string('img_perfil', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();
        
            $table->foreign('rol_id_fk')
                ->references('rol_id')->on('tipo_usuario')
                ->onDelete('cascade');
        });
        
        
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};