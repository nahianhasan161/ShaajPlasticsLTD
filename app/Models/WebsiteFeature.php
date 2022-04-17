<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteFeature extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function details()
    {

        return $this->belongsTo(WebsiteContactDetails::class,'details_id','id');
    }

}
