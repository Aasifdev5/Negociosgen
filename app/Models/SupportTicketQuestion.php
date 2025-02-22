<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['id'];

    public function translations()
{
    return $this->hasMany(SupportTicketTranslation::class, 'support_ticket_question_id'); // Correct foreign key
}


public function getTranslation($field, $locale)
{
    $translation = $this->translations()
        ->where('locale', $locale)
        ->value($field);

    return $translation ?? $this->$field; // Fallback to default field if no translation exists
}
}
