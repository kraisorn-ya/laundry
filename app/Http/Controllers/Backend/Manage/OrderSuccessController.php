<?php

namespace App\Http\Controllers\Backend\Manage;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderSuccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $orders = Order::query()
            ->where('order_status','!=',0)
            ->where('order_status','!=',5)
            ->paginate(6);
        return view('admin.order-success.index',compact('orders'));
    }

    public function dataCustomer($id)
    {
        $orders = Order::find($id);
        return view('admin.order-success.data-customer',compact('orders'));
    }

    public function orderStatus($id)
    {
        $orders = Order::find($id);
        if ($orders->order_status == 1){
            $orders->order_status = 2;
        }
        elseif ($orders->order_status == 2){
            $orders->order_status = 3;
        }
        elseif ($orders->order_status == 3){
            $orders->order_status = 4;
        }
        elseif ($orders->order_status == 4){
            $orders->order_status = 5;
        }

        $orders->update();
        return redirect()->route('admin.order-success.index')->with('success','ส่งเสื้อผ้าให้ลูกค้าเรียบร้อยแล้ว');
    }

    public function sendStatus($id)
    {
        $orders = Order::find($id);
        $orders->send_status = 1;
        $orders->update();

        return redirect()->route('admin.order-success.index');
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('admin.order-success.detail', compact('order_details'));
    }

}
