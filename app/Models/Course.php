<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_name',
        'coach_video',
        'coach_thumbnail',
        'courses',
    ];

    protected $casts = [
        'courses' => 'array',
    ];

    public function getCoursesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setCoursesAttribute($value)
    {
        $this->attributes['courses'] = json_encode($value);
    }

    /**
     * Get the embed URL for the coach's video
     *
     * @param string $videoUrl
     * @return string
     */
    public function getEmbedUrl($videoUrl)
    {
         // For YouTube
         if (preg_match('/youtube\.com/', $videoUrl) || preg_match('/youtu\.be/', $videoUrl)) {
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.*\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches);
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        // For Vimeo
        if (preg_match('/vimeo\.com/', $videoUrl)) {
            preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $matches);
            return 'https://player.vimeo.com/video/' . $matches[1];
        }

        // For Dailymotion
        if (preg_match('/dailymotion\.com/', $videoUrl)) {
            preg_match('/dailymotion\.com\/video\/([a-zA-Z0-9]+)/', $videoUrl, $matches);
            return 'https://www.dailymotion.com/embed/video/' . $matches[1];
        }

        return ''; // Return empty if no valid video link is found
    }
}

