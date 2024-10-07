<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];

    // Relación con el post al que pertenece el comentario
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // Relación con el usuario que hizo el comentario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
