<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{

    Protected $fillable = ["facility_name" , "additional_price" , "room_id"];
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
