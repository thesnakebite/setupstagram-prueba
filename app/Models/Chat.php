<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_sent',
        'user_recive',
    ];

    // Relación con el usuario que envió el mensaje
    public function userSent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el usuario que recibió el mensaje
    public function userReceive(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con los mensajes del chat
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
