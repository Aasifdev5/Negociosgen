<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'refer_id',
        'level',
        'percentage',
        'commission',
        'date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
