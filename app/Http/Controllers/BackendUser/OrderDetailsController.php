<?php

namespace App\Http\Controllers\BackendUser;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            ->where('order_status','1')
            ->orderBy('updated_at','desc')
            ->limit(1)
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
}
