<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipo_usuarios extends Model
{
    protected $table = "tipo_usuarios";
    protected $primaryKey = "rol_id";
    public $timestamps = false;
    protected $fillable = [
        'rol_id',
        'rol'
    ];
}
