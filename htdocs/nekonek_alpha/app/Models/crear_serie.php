<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class crear_serie extends Model
{
    use HasFactory;
    protected $table = 'crear_series';
    public $timestamps = false;
    protected $primaryKey = 'seriecreada_id';
    protected $fillable = [
        'titulo',
        'subtitulo',
        'genero_1',
        'genero_2',
        'descripcion',
        'miniatura_cuadrada',
        'miniatura_vertical',
        'fecha_creacion',
        'ultima_actualizacion'
    ];
    
}
