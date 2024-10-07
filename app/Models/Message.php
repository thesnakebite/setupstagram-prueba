<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'user_id',
        'message',
        'file_path',
        'file_name',
        'send_date',
        'type',
    ];

    // Relación con el usuario que envió el mensaje
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el chat al que pertenece el mensaje
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }
}
