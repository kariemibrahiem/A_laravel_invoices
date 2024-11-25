<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
