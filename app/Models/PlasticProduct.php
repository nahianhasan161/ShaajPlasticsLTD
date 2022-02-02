<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlasticProduct extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
