<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function order()
    {

        return $this->belongsTo(Order::class);
    }
    public function details()
    {
        return $this->belongsTo(PlasticProduct::class,'product_id','id');
    }
    public function deliveryProducts()
    {
        return $this->hasMany(DeliveryProduct::class,'id','order_product_id');
    }
    public function billProducts()
    {

        return $this->hasMany(BillProducts::class,'id','order_product_id');
    }
}
