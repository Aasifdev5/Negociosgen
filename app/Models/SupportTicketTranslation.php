<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['support_ticket_question_id', 'locale', 'question', 'answer'];

    public function supportTicket()
    {
        return $this->belongsTo(SupportTicketQuestion::class);
    }
}
