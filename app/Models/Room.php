<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    Protected $fillable = ["hotels_id" , "book_price" , "res_status" , "status" ,"room_num"];

    public function hotels(){
        return $this->belongsTo(Hotels::class);
    }

    public function booking()
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
