<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pilot extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'lastname',
        'date_of_birth',
        'nationality',
    ];
    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
}
