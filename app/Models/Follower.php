<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Follower extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follower_id',
    ];

    // Relación con el usuario que está siendo seguido
    public function followedUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el usuario que es el seguidor
    public function followingUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
