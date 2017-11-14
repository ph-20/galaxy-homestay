<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    
    public function booking_rooms()
    {
        return $this->belongsToMany('App\BookingRoom', 'booking_rooms', 'service_id', 'book_room_id');
    }
}
