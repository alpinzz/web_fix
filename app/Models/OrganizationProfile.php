<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'history',
        'vision',
        'mission',
        'logo',
        'email',
        'phone',
        'address',
        'social_media',
        'video_url',
    ];

    protected $casts = [
        'social_media' => 'array',
        'mission' => 'array',
    ];
}
