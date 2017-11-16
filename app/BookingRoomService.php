<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRoomService extends Model
{
    protected $table = 'booking_room_services';
    
    public function services()
    {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
