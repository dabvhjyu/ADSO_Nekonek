<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subir_capitulo extends Model
{
    use HasFactory;
    protected $table = 'subir_capitulo';
    public $timestamps = false;
    protected $primaryKey = 'id_capitulo';
    protected $fillable = [
        'numero',
        'titulo',
        'imagen_previa',
        'archivo',
        'comentarios',
        'publicacion',
    ];  
    protected $hidden = [
        'creacion_fecha',
        'actualizacion_fecha',
    ];
}
