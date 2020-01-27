<?php

namespace App\Http\Controllers\backend;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
       $orders = Order::query()
           ->where('order_status','5')
           ->paginate(6);
        return view('admin.order-details.index',compact('orders'));
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('admin.order-details.details',compact('order_details'));
    }
}
