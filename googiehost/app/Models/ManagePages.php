<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagePages extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'page_name',
        'page_status',
    ];

    public function heroSections()
    {
        return $this->hasMany(HeroSection::class, 'page_id');
    }
    public function serviceService()
    {
        return $this->hasMany(ServiceSection::class, 'page_id');
    }
    public function faqSection()
    {
        return $this->hasMany(faq::class, 'page_id');
    }
}
