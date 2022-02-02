<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

   public Static function boot()
   {
       parent::boot();
       static::creating(function($model){
           $prefix = 'SPL-';

        $model->tracking_id = $prefix.'-'.str_pad($model->max('id')+1,5,0,STR_PAD_LEFT);

       });
   }
    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
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
