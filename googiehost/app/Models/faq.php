<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class faq extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'page_id',
        'question',
        'answer',
        'status',
    ];

    public function pageFaqs()
    {
        return $this->belongsTo(ManagePages::class, 'page_id');
    }
}
