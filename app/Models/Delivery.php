<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Delivery extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function products()
    {
        return $this->hasMany(DeliveryProduct::class);
    }


    public Static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $prefix = 'SPLD';
         if($model->max('id')){

         }
         /* $model->tracking_id = $prefix.'-'.str_pad(($model->withTrashed()->max('id') ? $model->withTrashed()->max('id') : 0) +1,5,0,STR_PAD_LEFT); */
         $model->tracking_id = $prefix.'-'.str_pad($model->withTrashed()->max('id')  +1,5,0,STR_PAD_LEFT);

        });
    }

    public function transections()
    {
        return $this->belongsToMany(AccountTransection::class,'DeliveryTransection','delivey_id','account_transection_id');
    }


}
