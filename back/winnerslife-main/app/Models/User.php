<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "users_life";

    protected $fillable = [

        'nombre_user',
        'apellido_user',
        'ci_user',
        'correo_user',
        'password_user',
        'status_user',
        'id_paises',
        'id_permissions',
        'id_courses',
        'id_students'
    ];
}
