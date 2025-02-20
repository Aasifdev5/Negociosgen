<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessTips extends Model
{
    use HasFactory;
protected $table = 'successtips';
    protected $fillable = [
        'coach_name',
        'course_title',
        'course_description',
        'coach_video',
        'coach_thumbnail',

    ];


    /**
     * Get the embed URL for the coach's video
     *
     * @param string $videoUrl
     * @return string
     */
    public function getEmbedUrl($videoUrl)
    {
        // If already an embed URL, return it directly
        if (preg_match('/player\.vimeo\.com\/video\/\d+/', $videoUrl)) {
            return $videoUrl;
        }

        // Handle YouTube
        if (preg_match('/youtube\.com|youtu\.be/', $videoUrl)) {
            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.*\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches)) {
                return 'https://www.youtube.com/embed/' . $matches[1];
            }
        }

        // Handle Vimeo (Public & Private Videos)
        if (preg_match('/vimeo\.com/', $videoUrl)) {
            if (preg_match('/(?:vimeo\.com\/(?:video\/)?|vimeo\.com\/showcase\/\d+\/video\/|vimeo\.com\/ondemand\/[^\/]+\/|vimeo\.com\/channels\/[^\/]+\/|vimeo\.com\/groups\/[^\/]+\/videos\/|vimeo\.com\/album\/\d+\/video\/|vimeo\.com\/event\/\d+#\/video\/|vimeo\.com\/\d+\/)(\d+)/', $videoUrl, $matches)) {
                $videoId = $matches[1];

                // Extract private access token (if exists)
                if (preg_match('/vimeo\.com\/\d+\/([a-zA-Z0-9]+)/', $videoUrl, $tokenMatches)) {
                    $privateToken = $tokenMatches[1];
                    return "https://player.vimeo.com/video/$videoId?h=$privateToken";
                }

                return "https://player.vimeo.com/video/$videoId";
            }
        }

        // Handle Dailymotion
        if (preg_match('/dailymotion\.com/', $videoUrl)) {
            if (preg_match('/dailymotion\.com\/video\/([a-zA-Z0-9]+)/', $videoUrl, $matches)) {
                return 'https://www.dailymotion.com/embed/video/' . $matches[1];
            }
        }

        return ''; // Return empty if no valid video link is found
    }
}

