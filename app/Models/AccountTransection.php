<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountTransection extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    public function orders()
    {
        return $this->belongsToMany(Order::class,'OrderTransection','account_transection_id','order_id');
    }
    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class,'DeliveryTransection','account_transection_id','delivey_id');
    }
}
