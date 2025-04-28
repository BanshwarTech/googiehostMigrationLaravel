<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vpsHostingOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'page_id',
        'title',
        'price',
        'image',
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
    public function pageVpsOffer()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
