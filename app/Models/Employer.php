<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    use HasFactory;

    /**
     * Get the jobs owned by the employer.
     *
     * @return HasMany relationship
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get the user that owns this employer.
     *
     * @return BelongsTo relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
