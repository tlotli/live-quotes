<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
      'follower',
      'followee',
    ];

//    public function follower() {
//        return $this->hasMany(BusinessProfile::class , 'business_profile_id');
//    }
}
