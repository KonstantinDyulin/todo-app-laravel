<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthSession extends Model
{
    protected $fillable = [
        'user_uuid',
        'client_api',
        'user_agent',
        'refresh_token',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_uuid');
    }
}
