<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    use HasFactory;

    public $timestamps = false;

    private const DEFAULT_TEMPLATES = [
        'password_reset',
        'email_verification',
    ];

    protected $fillable = [
        'alias',
        'name',
        'subject',
        'body',
        'status',
        'shortcodes', // Ensure this is included for mass assignment
    ];


    public function isDefault()
    {
        return in_array($this->alias, self::DEFAULT_TEMPLATES);
    }


}
