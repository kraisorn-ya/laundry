<?php

namespace App\Http\Controllers\BackendUser;

use App\Articles;
use App\Clothes;
use App\Http\Requests\OrderUser\OrderRequest;
use App\Http\Requests\Service\ServiceRequest;
use App\Order;
use App\Service;
use App\ServiceType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $service_types = ServiceType::all();
        $users = User::all();
        return view('backend-users.order.index', compact('service_types','users'));
    }

    public function post(Request $request)
    {
        $orders = new Order;
        $orders->user_id = Auth::user()->id;
        $orders->address = $request->address;
        $orders->pay_status = 0;
        $orders->order_status = 0;

        $orders->save();
        return redirect()->route('home')->with('success','เรียกใช้บริการแล้ว');
    }

}
