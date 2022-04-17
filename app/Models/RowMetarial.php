<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RowMetarial extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }
    public function histories()
    {
        return $this->hasMany(RowMaterialQuantityHistory::class);
    }

    public static function boot()
{
    parent::boot();
    static::deleting(function($rowMaterial){
        $rowMaterial->histories->each(function($history){
           $history->delete();
        });
    });
}

}
