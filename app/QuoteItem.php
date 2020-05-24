<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    protected $fillable = [
      'business_profile_id',
      'quotation_request_id',
      'status',
      'quantity',
      'price',
      'description',
    ];

    public function business_profile() {
        return $this->belongsTo(BusinessProfile::class , 'business_profile_id');
    }

    public function quotation_request() {
        return $this->belongsTo(QuotationRequests::class , 'quotation_request_id');
    }

}
