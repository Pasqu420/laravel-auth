<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'model',
        'kw',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function pilots()
    {
        return $this->belongsToMany(Pilot::class);
    }
}
