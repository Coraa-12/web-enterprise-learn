<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'bio',
    ];

    /**
     * Get the user that owns the profile (One-to-One).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
