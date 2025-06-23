<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tipo_usuario extends Model
{
    use HasFactory;
    protected $table = 'tipo_usuario';
    public $timestamps = false;
    protected $primaryKey = 'rol_id';
    protected $fillable = [
        'rel'
    ];

    

    
    
}





