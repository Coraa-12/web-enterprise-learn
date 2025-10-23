<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'bio',
    ];

    /**
     * Get the books for the author (One-to-Many).
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
