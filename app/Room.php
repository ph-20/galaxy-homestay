<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    
    public function room_types()
    {
        return $this->belongsTo('App\RoomType','room_type_id','id');
    }
    public function bookings(){
        return $this->belongsToMany('App\Booking','booking_rooms','room_id','booking_id');
    }
}
