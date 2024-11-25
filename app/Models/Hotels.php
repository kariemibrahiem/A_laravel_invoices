<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    Protected $fillable = [""];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
