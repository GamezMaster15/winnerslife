<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "permissions_life";

    protected $fillable = [

        'nombre_permissions',
        'tipo_permissions',
        'status_permissions'

    ];
}
