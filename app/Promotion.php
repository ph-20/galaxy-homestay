<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $dates = ['dob'];
    
    public function room_types(){
        return $this->belongsTo('App\RoomType','room_type_id','id');
    }
}
