<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class crear_serie extends Model
{
    use HasFactory;
    protected $table = 'crear_series';
    public $timestamps = true;
    protected $primaryKey = 'seriecreada_id';
    protected $fillable = [
        'titulo',
        'subtitulo',
        'descripcion',
        'miniatura_cuadrada',
        'miniatura_vertical',
        'genero_id',
        'estado_id',

    ];




}
