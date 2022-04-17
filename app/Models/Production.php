<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rowMaterials()
    {
        return $this->hasMany(Production::class,'parent_id','id');
    }
    public function producedMeterial()
    {
        return $this->belongsTo(Production::class,'id','parent_id');
    }
    public function factory()
    {
        return $this->belongsTo(Factory::class);
    }
}
