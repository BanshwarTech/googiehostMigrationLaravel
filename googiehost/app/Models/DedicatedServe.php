<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DedicatedServe extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'page_id',
        'logo_image',
        'read_review_url',
        'deal_points',
        'discount',
        'button_text',
        'button_link',
        'short_desc',
        'status'
    ];
    public function pageDedicated()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
