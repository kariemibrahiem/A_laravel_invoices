<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    Protected $fillable = ["tag_name" , "room_id"];
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
