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
        $search = "";
        $service_types = ServiceType::paginate(6);
        return view('admin.service-type.index',compact('service_types','search'));
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

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == ""){
            $service_types = ServiceType::query()
                ->paginate(6);
            return view('admin.service-type.index',compact('service_types','search'));
        }
        else
        {
            $service_types = ServiceType::query()
                ->where('name','LIKE','%'.$search.'%')
                ->paginate(6);
            $service_types->appends($request->only('search'));
            return view('admin.service-type.index',compact('service_types','search'));
        }
    }

    public function destroy($id)
    {
        $service_type = ServiceType::find($id);
        $service_type->delete();
        return redirect()->route('admin.service-type.index')->with('deleted','ลบประเภทบริการเรียบร้อย');
    }
}
