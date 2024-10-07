<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'description',
        'date_post',
        'user_id',
    ];

    // Relación con el usuario que creó el post
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con los comentarios del post
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    // Relación con los likes del post
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'post_id');
    }
}
