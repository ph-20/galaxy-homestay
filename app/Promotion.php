<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    
    
    public function roomTypes()
    {
        return $this->belongsTo('App\RoomType', 'room_type_id', 'id');
    }
}
