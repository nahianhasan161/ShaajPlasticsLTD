<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryProducts extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product_code()
    {
       return $this->hasMany(InventoryProducts::class,'parent_id','id');
    }

    public function products()
    {
        return $this->belongsTo(InventoryProducts::class,'id');
    }
}
