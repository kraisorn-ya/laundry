<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceTypeEditRequest;
use App\Http\Requests\ServiceTypeRequest;
use App\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $service_types = ServiceType::paginate(6);
        return view('admin.service-type.index',compact('service_types'));
    }

    public function create()
    {
        return view('admin.service-type.create');
    }

    public function store(ServiceTypeRequest $request)
    {
        $service_type = new ServiceType;
        $service_type->name = $request->name;
        $service_type->save();
        return redirect()->route('admin.service-type.index')->with('success','เพิ่มประเภทบริการ');
    }

    public function edit($id)
    {
        $service_type = ServiceType::find($id);
        return view('admin.service-type.edit',compact('service_type'));
    }

    public function update(ServiceTypeEditRequest $request, $id)
    {
//        dd($request);
        $service_type = ServiceType::find($id);
        $service_type->name = $request->name;
        $service_type->update();
        return redirect()->route('admin.service-type.index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $service_type = ServiceType::find($id);
        $service_type->delete();
        return redirect()->route('admin.service-type.index')->with('deleted','ลบประเภทบริการเรียบร้อย');
    }
}
