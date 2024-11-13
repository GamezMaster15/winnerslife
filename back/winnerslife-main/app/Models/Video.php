<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "video_life";

    protected $fillable = [
        'nombre_video',
        'description_video',
        'url_video',
        'status_video'
    ];
}
