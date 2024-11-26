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
    public function getEmbedUrl($videoLink)
    {
        // For YouTube
        if (preg_match('/youtube\.com/', $videoLink) || preg_match('/youtu\.be/', $videoLink)) {
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.*\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoLink, $matches);
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // For Vimeo
        if (preg_match('/vimeo\.com/', $videoLink)) {
            preg_match('/vimeo\.com\/(\d+)/', $videoLink, $matches);
            return 'https://player.vimeo.com/video/' . $matches[1];
        }

        // For Dailymotion
        if (preg_match('/dailymotion\.com/', $videoLink)) {
            preg_match('/dailymotion\.com\/video\/([a-zA-Z0-9]+)/', $videoLink, $matches);
            return 'https://www.dailymotion.com/embed/video/' . $matches[1];
        }

        return ''; // Return empty if no valid video link is found
    }

    // Automatically generate UUID when creating a new record
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->uuid = (string) Str::uuid();
        });
    }
}


