<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
    ];

    // Relación con el post al que pertenece el like
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // Relación con el usuario que dio el like
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
