<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function getStatisticRevenue(Request $request)
    {
        $startDate = $request->txtStartDate;
        $endDate = $request->txtEndDate;
        if(!$startDate || !$endDate) {
            $booking = Booking::where('status', 4)->get();
            $total = Booking::where('status', 4)->sum('total');
            return view('admin.statistic.revenue', compact('booking', 'total'));
        }else {
            $booking = Booking::where('check_out', '>=', $startDate)->where('check_out', '<=', $endDate)->where('status', 4)->get();
            $total = Booking::where('check_out', '>=', $startDate)->where('check_out', '<=', $endDate)->where('status', 4)->sum('total');
            return view('admin.statistic.revenue', compact('booking', 'startDate', 'endDate', 'total'));
        }
    }
    
    public function getStatisticRoom()
    {
        $room = Room::all();
        return view('admin.statistic.room', compact('room'));
    }
}
