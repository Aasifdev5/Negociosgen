<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSettings extends Model
{
    use HasFactory;
    protected $table = 'home_settings';  // Specify the table name

    protected $fillable = [
        'key',
        'title',
        'description',
        'video',
        'video_thumbnail',
        'video_caption',
    ];
}
