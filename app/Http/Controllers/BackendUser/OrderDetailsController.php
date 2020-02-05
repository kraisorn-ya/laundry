<?php

namespace App\Http\Controllers\BackendUser;

use App\Http\Requests\PayRequest;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = Auth::user()->id;
        $orders = Order::query()
            ->where('user_id',$users)
            ->where('order_status','!=','0')
            ->where('order_status','!=','5')
            ->orderBy('updated_at','desc')
//            ->limit(1)
            ->get();
        return view('backend-users.order-details.index',compact('orders'));
    }
    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('backend-users.order-details.details',compact('order_details'));
    }

    public function pay($id)
    {
        $orders = Order::find($id);
        return view('backend-users.order-details.pay',compact('orders'));
    }

    public function update(PayRequest $request, $id)
    {
        $orders = Order::find($id);
        $orders->image = $request['image']->store('uploads','public');
        $orders->pay_status = 1;
        $orders->update();

        return redirect()->route('users.order-details.index')->with('success','ส่งหลักฐานการโอนเงิน รอการตรวจสอบจากพนักงาน');
    }
}
