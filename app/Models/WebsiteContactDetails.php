<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteContactDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function feature()
    {
       return $this->hasOne(WebsiteFeature::class,'details_id','id');
    }
    public function service()
    {
       return $this->hasOne(WebsiteServices::class,'details_id','id');
    }
}
