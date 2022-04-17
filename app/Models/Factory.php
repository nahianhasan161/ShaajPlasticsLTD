<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factory extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function rowmeterials()
    {
        return $this->hasMany(RowMetarial::class);
    }
    public function productions()
    {
        return $this->hasMany(Production::class);
    }

    public static function boot()
{
    parent::boot();
    static::deleting(function($factory){
        $factory->rowmeterials->each(function($material){

            $material->histories->each(function($history){
                $history->delete();
            });
            $material->delete();
        });
    });
}

}
