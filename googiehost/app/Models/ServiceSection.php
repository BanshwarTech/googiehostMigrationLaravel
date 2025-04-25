<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceSection extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'image',
        'button_text',
        'button_link',
        'status',
    ];
    public function pageService()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
