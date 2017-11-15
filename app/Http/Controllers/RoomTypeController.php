<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\RoomType;

use Illuminate\Support\Facades\File;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomType = RoomType::all();
        return view('admin.roomtypes.list', compact('roomType'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomtypes.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        $roomType = new RoomType();
        if ($request->hasFile('fImage')) {
            $fileImage = $request->fImage;
            $tail = $fileImage->getClientOriginalExtension();
            if ($tail == 'jpg' || $tail == 'png' || $tail == 'jpeg') {
                $name = $fileImage->getClientOriginalName();
                $image = str_random(4) . '_' . $name;
                while (file_exists(asset('images' . '_' . $image))) {
                    $image = str_random(4) . '_' . $name;
                }
                $fileImage->move('images', $image);
                $roomType->thumbnail = $image;
            } else {
                return redirect()->back()->withErrors('File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg');
            }
            $roomType->name = $request->txtName;
            $roomType->price = $request->txtPrice;
            $roomType->detail = $request->txtDetail;
            $roomType->description = $request->txtDescription;
            $roomType->save();
        }
        //$roomType->save();
        return redirect()->back()->withSuccess('Thêm Loại Phòng Thành Công');
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
        $roomType = RoomType::findOrFail($id);
        return view('admin.Roomtypes.edit', compact('roomType'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, $id)
    {
        $roomType = RoomType::findOrFail($id);
        if ($request->hasFile('fImage')) {
            $fileImage = $request->fImage;
            $tail = $fileImage->getClientOriginalExtension();
            if ($tail == 'jpg' || $tail == 'png' || $tail == 'jpeg') {
                $name = $fileImage->getClientOriginalName();
                $image = str_random(4) . '_' . $name;
                while (file_exists(asset('images' . '_' . $image))) {
                    $image = str_random(4) . '_' . $name;
                }
                $fileImage->move('images', $image);
                File::delete('images/' . $roomType->thumbnail);
                $roomType->thumbnail = $image;
            } else {
                return redirect()->back()->withErrors('File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg');
            }
        }
        //$roomType->save();
        $roomType->name = $request->txtName;
        $roomType->price = $request->txtPrice;
        $roomType->detail = $request->txtDetail;
        $roomType->description = $request->txtDescription;
        $roomType->update();
        return redirect()->back()->withSuccess('Sửa Loại Phòng Thành Công');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);
        File::delete('images/' . $roomType->thumbnail);
        $roomType->delete();
        return redirect()->back()->withSuccess('Xóa Loại Phòng Thành Công');
    }
}
