<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'courses';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'video_link',
        'uuid', // Add uuid to fillable attributes
        'video_thumbnail', // Add video_thumbnail to fillable attributes
    ];

    // Automatically generate UUID when creating a new record
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->uuid = (string) Str::uuid();
        });
    }
}


