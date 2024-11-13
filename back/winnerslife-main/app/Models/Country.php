<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $table = "paises_life";

    protected $fillable = [
        'iso_paises',
        'nombre_paises'
    ];
}
