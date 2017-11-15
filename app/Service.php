<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    
    public function bookingRooms()
    {
        return $this->belongsToMany('App\BookingRoom', 'booking_rooms', 'service_id', 'book_room_id');
    }
    public function bookingRoomServices(){
        return $this->hasMany('App\BookingRoomService','service_id','id');
    }
}
