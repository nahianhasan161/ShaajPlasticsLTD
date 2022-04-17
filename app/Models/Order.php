<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];


    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class)->withTrashed();
    }
    public function via()
    {
        return $this->belongsTo(Via::class)->withTrashed();
    }
    public function product()
    {
        return $this->belongsTo(PlasticProduct::class);
    }
    public function products()
    {
        return $this->hasMany(OrderProducts::class);
    }
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function transections()
    {
        return $this->belongsToMany(AccountTransection::class,'OrderTransection','order_id','account_transection_id');
    }

    public Static function boot()
   {
       parent::boot();
       static::creating(function($model){
           $prefix = 'SPL';
        if($model->max('id')){

        }
        /* $model->tracking_id = $prefix.'-'.str_pad(($model->withTrashed()->max('id') ? $model->withTrashed()->max('id') : 0) +1,5,0,STR_PAD_LEFT); */
        $model->tracking_id = $prefix.'-'.str_pad($model->withTrashed()->max('id')  +1,5,0,STR_PAD_LEFT);

       });
   }

}
