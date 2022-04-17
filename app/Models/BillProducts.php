<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillProducts extends Model
{
    use HasFactory;
    protected $guarded =  [];
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
    public function orderProduct()
    {
        return $this->belongsTo(OrderProducts::class,'order_product_id','id');
    }
}
