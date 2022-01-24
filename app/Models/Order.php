<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function via()
    {
        return $this->belongsTo(Via::class);
    }
    public function product()
    {
        return $this->belongsTo(PlasticProduct::class);
    }
}
