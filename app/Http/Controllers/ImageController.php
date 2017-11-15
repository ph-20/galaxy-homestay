<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Image::all();
        return view('admin.images.list', compact('image'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = new Image();
        if ($request->hasFile('fImage')) {
            $fileImage = $request->fImage;
            $tail = $fileImage->getClientOriginalExtension();
            if ($tail == 'jpg' || $tail == 'png' || $tail == 'jpeg') {
                $name = $fileImage->getClientOriginalName();
                $image = str_random(4) . '_' . $name;
                while(file_exists(asset('images' . '_' . $image))) {
                    $image = str_random(4) . '_' . $name;
                }
                $fileImage->move('images', $image);
                $images->image = $image;
            } else {
                return redirect()->back()->withErrors('File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg');
            }
            $images->status = $request->rdoStatus;
            $images->save();
            return redirect()->back()->withSuccess('Thêm Thành Công');
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.images.edit', compact('image'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $images = Image::findOrFail($id);
        if ($request->hasFile('fImage')) {
            $fileImage = $request->fImage;
            $tail = $fileImage->getClientOriginalExtension();
            if ($tail == 'jpg' || $tail == 'png' || $tail == 'jpeg') {
                $name = $fileImage->getClientOriginalName();
                $image = str_random(4) . '_' . $name;
                while(file_exists(asset('images' . '_' . $image))) {
                    $image = str_random(4) . '_' . $name;
                }
                $fileImage->move('images', $image);
                File::delete('images/'.$images->image);
                $images->image = $image;
            } else {
                return redirect()->back()->withErrors('File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg');
            }
            $images->status = $request->rdoStatus;
            $images->update();
            return redirect()->back()->withSuccess('Thêm Thành Công');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return redirect()->back()->withSuccess('Xóa Hình Ảnh Thành Công');
    }
}
