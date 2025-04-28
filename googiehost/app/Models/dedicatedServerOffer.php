<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dedicatedServerOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'page_id',
        'title',
        'price',
        'image',
        'number_rating',
        'star_rating',
        'performance',
        'speed',
        'support',
        'description',
        'response_time',
        'server_uptime',
        'live_status',
        'button_link',
        'list_heading',
        'list_point',
        'status'
    ];

    public function pageDedicatedOffer()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
