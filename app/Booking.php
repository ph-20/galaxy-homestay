<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    //
    
    protected $table = 'bookings';
   
    public function rooms(){
        return $this->belongsToMany('App\Room','booking_rooms','booking_id','room_id');
    }
}
