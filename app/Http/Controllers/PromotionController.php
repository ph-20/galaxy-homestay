<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Promotion;
use App\RoomType;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotion = Promotion::all();
        return view('admin.promotions.list', compact('promotion'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = RoomType::all();
        return view('admin.promotions.create', compact('roomType'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        $promotion = new Promotion();
        $allPromtion = Promotion::all();
        foreach($allPromtion as $list){
            if($list->room_type_id == $request-> sleRoomType && $list->start_date <= $request->txtStartDate && $list->end_date >= $request->txtEndDate ){
                return redirect()->back()->withErrors('Đang Tồn Tại Chương Trình Khuyến Mãi Với Loại Phòng Này');
            }
            
        }
        $promotion->name = $request->txtName;
        $promotion->discount = $request->txtDiscount;
        $promotion->room_type_id = $request->sleRoomType;
        $promotion->start_date = $request->txtStartDate;
        $promotion->end_date = $request->txtEndDate;
        $promotion->save();
        return redirect()->back()->withSuccess('Thêm Chương Trình Khuyến Mãi Thành Công');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::findOrFail($id);
        $roomType = RoomType::all();
        return view('admin.promotions.edit', compact('promotion', 'roomType'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request, $id)
    {
        $promotion = Promotion::findOrFail($id);
        $allPromtion = Promotion::all();
        foreach($allPromtion as $list){
            if($list->room_type_id == $request-> sleRoomType && $list->start_date <= $request->txtStartDate && $list->end_date >= $request->txtEndDate ){
                return redirect()->back()->withErrors('Đang Tồn Tại Chương Trình Khuyến Mãi Với Loại Phòng Này');
            }
        }
        $promotion->name = $request->txtName;
        $promotion->discount = $request->txtDiscount;
        $promotion->room_type_id = $request->sleRoomType;
        $promotion->start_date = $request->txtStartDate;
        $promotion->end_date = $request->txtEndDate;
        $promotion->update();
        return redirect()->back()->withSuccess('Sửa Chương Trình Khuyến Mãi Thành Công');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->back()->withSuccess('Xóa Chương Trình Khuyến Mãi Thành Công');
    }
}
