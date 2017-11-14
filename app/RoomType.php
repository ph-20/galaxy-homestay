<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';
    
    public function rooms()
    {
        return $this->hasMany('App\Room', 'room_type_id', 'id');
    }
    
    public function promotions()
    {
        return $this->hasMany('App\Promotion', 'room_type_id', 'id');
    }
}
