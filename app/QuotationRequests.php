<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationRequests extends Model
{
    protected $fillable = [
        'title',
        'requirements',
        'specification',
        'closing_date',
        'business_profile_id',
        'business_sector_id',
        'status',
        'user_id',
    ];

    public function business_profile() {
        return $this->belongsTo(BusinessProfile::class , 'business_profile_id');
    }

    public function business_sector() {
        return $this->belongsTo(BusinessSector::class , 'business_sector_id');
    }

}
