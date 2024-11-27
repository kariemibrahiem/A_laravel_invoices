<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    Protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotels::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }



}
