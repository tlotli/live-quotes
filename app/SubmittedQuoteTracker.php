<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmittedQuoteTracker extends Model
{
    protected $fillable = [
      'quotation_request_id',
      'business_profile_id',
    ];
}
