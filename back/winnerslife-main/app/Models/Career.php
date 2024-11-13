<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'career_life';

    protected $fillable = [
        'nombre_career',
        'descripcion_career',
        'status_career'
    ];
}
