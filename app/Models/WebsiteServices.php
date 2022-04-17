<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteServices extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function details()
    {
        return $this->belongsTo(WebsiteContactDetails::class,'id','details_id');
    }
}
