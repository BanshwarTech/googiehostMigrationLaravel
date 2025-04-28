<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class paidHostingOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'page_id',
        'title',
        'offer_text',
        'image',
        'description',
        'button_link',
        'status'
    ];
    public function pagePaidOffer()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
