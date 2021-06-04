<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
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
