<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    //desactivar el timestamps
    public $timestamps = false;
    //selecciono la tabla a usar
    protected $table = "students_life";

    //defino los campos que se pueden llenar
    protected $fillable = [
        'primernombre_students',
        'segundonombre_students',
        'primerapellido_students',
        'segundoapellido_students',
        'ci_students',
        'correo_student',
        'status_student',
        'id_paises'
    ];
}
