<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomType;
use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::all();
        return view('admin.rooms.list', compact('room'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = RoomType::all();
        return view('admin.rooms.create', compact('roomType'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $room = new Room();
        if($request->hasFile('fImage')) {
            $fileImage = $request->fImage;
            $tail = $fileImage->getClientOriginalExtension();
            if($tail == 'jpg' || $tail == 'png' || $tail == 'jpeg') {
                $name = $fileImage->getClientOriginalName();
                $image = str_random(4) . '_' . $name;
                while(file_exists(asset('images/' . '_' . $image))) {
                    $image = str_random(4) . '_' . $name;
                }
                $fileImage->move('images/', $image);
                $room->thumbnail = $image;
            }else {
                return redirect()->back()->withErrors('File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg');
            }
            $room->room_code = $request->txtName;
            $room->description = $request->txtDescription;
            $room->room_type_id = $request->idKindRoom;
            $room->status = $request->rdoStatus;
            $room->save();
            return redirect()->back()->withSuccess('Thêm Thành Công');
        }
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
//        if($room->status == 2 || $room->status == 3) {
//            return redirect()->back()->withErrors('Không Thể Sửa Phòng Đã Đặt Hoặc Đang Sử Dụng');
//        }
        $roomType = RoomType::all();
        return view('admin.rooms.edit', compact('room', 'roomType'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        
        $room = Room::findOrFail($id);
        if($request->hasFile('fImage')) {
            $fileImage = $request->fImage;
            $tail = $fileImage->getClientOriginalExtension();
            if($tail == 'jpg' || $tail == 'png' || $tail == 'jpeg') {
                $name = $fileImage->getClientOriginalName();
                $image = str_random(4) . '_' . $name;
                while(file_exists(asset('images' . '_' . $image))) {
                    $image = str_random(4) . '_' . $name;
                }
                $fileImage->move('images', $image);
                $room->thumbnail = $image;
            }else {
                return redirect()->back()->withErrors('File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg');
            }
        }else {
            $room->thumbnail = $room->thumbnail;
        }
        $room->room_code = $request->txtName;
        $room->description = $request->txtDescription;
        $room->room_type_id = $request->idKindRoom;
        $room->status = $request->rdoStatus;
        $room->update();
        return redirect()->back()->withSuccess('Sửa Thành Công');
        
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        if($room->status == 2 || $room->status == 3) {
            return redirect()->back()->withErrors('Không Thể Xóa Phòng Đã Đặt Hoặc Đang Sử Dụng');
        }else {
            File::delete('images/' . $room->thumbnail);
            $room->delete();
            return redirect()->back()->withSuccess('Xóa Phòng Thành Công');
        }
    }
}
