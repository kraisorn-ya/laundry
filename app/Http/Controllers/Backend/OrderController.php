<?php

namespace App\Http\Controllers\Backend;

use App\Service;
use App\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $services = Service::query()
        ->paginate(6);
        return view('admin.order.index', compact('services'));
//        $serviceTypes = ServiceType::all();
//        return view('admin.order.index', compact('serviceTypes'));
    }

    public function create()
    {
        $serviceTypes = ServiceType::all();
        return view('admin.order.create', compact('serviceTypes'));
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service->image != null)
        {
            Storage::delete('public/'.$service->image);
        }
        $service->delete();


        return redirect()->route('admin.order.index')->with('deleted','ลบพนักงานเรียบร้อย');
    }
}
