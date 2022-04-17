<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProduct extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
    public function orderProduct()
    {
        return $this->belongsTo(OrderProducts::class,'order_product_id','id');
    }
}

