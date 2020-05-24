<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    protected $fillable = [
        'company_name',
        'company_address',
        'company_telephone',
        'company_email',
        'company_fax',
        'company_province',
        'company_city',
        'company_registration_number',
        'user_id',
        'photo',
        'website',
        'tax_number',
        'business_sector_id',
        'company_profile',
    ];


    public function users() {
        return $this->hasMany(User::class);
    }

}
