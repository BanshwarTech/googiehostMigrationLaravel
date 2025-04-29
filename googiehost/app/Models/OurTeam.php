<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role',
        'profile_image',
        'linkedin_url',
        'twitter_url',
        'status'
    ];
}
