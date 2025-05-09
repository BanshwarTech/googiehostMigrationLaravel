<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroSection extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'page_id',
        'title',
        'subtitle',
        'listing_point',
        'image',
        'status',
    ];
    public function page()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
