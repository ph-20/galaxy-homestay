<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::where('status', '!=', 4)->where('status', '!=', 5)->get();
        return view('admin.bookings.list', compact('booking'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.detail', compact('booking'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //
//    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $status = $request->status;
        $listRoom = $booking->rooms;
        if ($status == 2) {
            $booking->status = $status;
            foreach ($listRoom as $list) {
                $list->status = 2 ;
                $list->update();
            }
            $booking->update();
            return redirect()->back()->withSuccess('Đã Xác Minh Đơn Đặt Phòng Có Id : '.$booking->id);
        }
        if ($status == 3) {
            $booking->status = $status;
            $booking->check_in = date('Y-m-d h-i-s');
            foreach ($listRoom as $list) {
                $list->status = 3 ;
                $list->update();
            }
            $booking->update();
            return redirect()->back()->withSuccess('Đã Check-in Đơn Đặt Phòng Có Id : '.$booking->id);
        }
        if ($status == 4) {
            $booking->status = $status;
            $booking->check_out = date('Y-m-d h-i-s');
            foreach ($listRoom as $list) {
                $list->status = 1 ;
                $list->update();
            }
            $booking->update();
            return redirect()->back()->withSuccess('Đã Check-out Đơn Đặt Phòng Có Id : '.$booking->id);
        }
        if ($status == 5) {
            $booking->status = $status;
            foreach ($listRoom as $list) {
                $list->status = 1 ;
                $list->update();
            }
            $booking->update();
            return redirect()->back()->withSuccess('Đã Hủy Đơn Đặt Phòng Có Id :'.$booking->id);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//    }
}
