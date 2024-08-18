<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialnetwork extends Model
{
    use HasFactory;
    protected $fillable =[
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'github_url',
        'twitter_url'
    ];
}
