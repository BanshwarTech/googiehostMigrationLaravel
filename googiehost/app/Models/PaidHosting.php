<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaidHosting extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'page_id',
        'plan_image',
        'rating',
        'listing_points',
        'deal_points',
        'button_text',
        'button_link',
        'disc_coupon',
        'status'
    ];
    public function pagePaid()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
