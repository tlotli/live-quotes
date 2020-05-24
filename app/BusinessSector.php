<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessSector extends Model
{
    protected $fillable = [
      'slug',
      'name',
    ];
}
