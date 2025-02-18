<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "courses_life";

    protected $fillable = [
        'nombre_courses',
        'status_courses',
        'id_category',
        'id_video',
        'id_career'
    ];
}
