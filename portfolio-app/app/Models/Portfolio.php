<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
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
}
