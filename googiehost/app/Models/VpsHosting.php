<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VpsHosting extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'page_id',
        'logo_image',
        'offer_image',
        'title',
        'description',
        'coupon_code',
        'button_text',
        'button_link',
        'status'
    ];
    public function pageVps()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
