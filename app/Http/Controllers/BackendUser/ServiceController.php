<?php

namespace App\Http\Controllers\BackendUser;

use App\Http\Requests\Service\ServiceRequest;
use App\Service;
use App\ServiceType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $service_types = ServiceType::all();
        $users = User::all();
        return view('backend-users.service.index', compact('service_types','users'));
    }

    public function post(ServiceRequest $request)
    {
        $services = new Service;
        $services->user_id = Auth::user()->id;
        $services->service_type_id = $request->service_type_id;
        $services->description = $request->description;
        $services->address = $request->address;
        $services->pay = $request->pay;
        if ($request->image != null)
        {
            $services->image = $request['image']->store('uploads','public');
        }
//        dd($services);
        $services->save();
        return redirect()->route('home')->with('success','เรียกใช้บริการแล้ว');
    }
}
