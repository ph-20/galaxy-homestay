<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::all();
        return view('admin.services.list', compact('service'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }
    
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->name = $request->txtName;
        $service->price = $request->txtPrice;
        $service->description = $request->txtDescription;
        $service->status = $request->rdoStatus;
        $service->save();
        return redirect()->back()->withSuccess('Thêm Dịch Vụ Thành Công');
    }
    
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }
    
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->name = $request->txtName;
        $service->price = $request->txtPrice;
        $service->description = $request->txtDescription;
        $service->status = $request->rdoStatus;
        $service->update();
        return redirect()->back()->withSuccess('Sửa Dịch Vụ Thành Công');
    }
    
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->back()->withSuccess('Xóa Dịch Vụ Thành Công');
    }
}

