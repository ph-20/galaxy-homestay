<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function getStatisticRevenue()
    {
    }
    
    public function getStatisticRoom()
    {
        $room = Room::all();
        return view('admin.statistic.room', compact('room'));
    }
}
