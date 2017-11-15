<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRoom extends Model
{
    protected $table = 'booking_rooms';
    
    public function services()
    {
        return $this->belongsToMany('App\Service', 'booking_room_services', 'book_room_id', 'service_id');
    }
    public function bookings(){
        return $this->belongsTo('App\Booking', 'booking_id', 'id');
    }
}
