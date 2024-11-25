<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    Protected $fillable = [];

    public function hotels(){
        return $this->belongsTo(Hotels::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function tags(){
        return $this->hasMany(Tags::class);
    }

    public function facilities(){
        return $this->hasMany(Facilities::class);
    }
}
