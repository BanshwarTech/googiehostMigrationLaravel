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
    public function serviceSections()
    {
        return $this->hasMany(ServiceSection::class, 'page_id');
    }
    public function faqSection()
    {
        return $this->hasMany(faq::class, 'page_id');
    }
    public function vpsHosting()
    {
        return $this->hasMany(VpsHosting::class, 'page_id');
    }
    public function paidHosting()
    {
        return $this->hasMany(PaidHosting::class, 'page_id');
    }
    public function dedicatedServer()
    {
        return $this->hasMany(DedicatedServe::class, 'page_id');
    }
    public function vpsHostingOffer()
    {
        return $this->hasMany(vpsHostingOffer::class, 'page_id');
    }
    public function paidHostingOffer()
    {
        return $this->hasMany(paidHostingOffer::class, 'page_id');
    }
    public function dedicatedServerOffer()
    {
        return $this->hasMany(dedicatedServerOffer::class, 'page_id');
    }
}
