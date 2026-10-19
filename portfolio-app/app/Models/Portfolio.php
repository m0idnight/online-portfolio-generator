<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'profile_picture',
        'email',
        'contact_number',
        'address',
        'about',
        'education',
        'skills',
        'projects',
        'experience',
        'social_links',
        'website',
        'template',
    ];

    /**
     * Get the user who owns this portfolio.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
