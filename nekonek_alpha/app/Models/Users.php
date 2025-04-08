<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $table = 'usuarios'; // Especifica el nombre de la tabla
}
