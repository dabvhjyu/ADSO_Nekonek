<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usuarios extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios'; 
    public $timestamps = false; // Desactiva los timestamps si no los necesitas

    protected $primaryKey = 'id_usuarios'; // Define `id_usuarios` como clave primaria
    public $incrementing = true; // Asegúrate de que sea autoincremental (si aplica)
    protected $keyType = 'int'; // Define el tipo de dato (int, bigint, etc.)

    protected $fillable = [
        'rol_id_fk',
        'nombre',
        'email',
        'telefono',
        'apodo',
        'fondo',
        'img_perfil',
        'password',
        'remember_token',
    ];

    function tipo_usuario()
    {
        return $this->belongsTo(tipo_usuario::class, 'rol_id_fk', 'rol_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
