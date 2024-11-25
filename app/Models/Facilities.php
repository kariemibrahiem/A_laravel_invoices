<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{

    public function rooms(){
        return $this->belongsTo(Room::class);
    }
}
