<?php

namespace App\Http\Controllers\Backend\Deliver;

use App\Order;
use App\OrderDetail;
use App\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfirmOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $orders = Order::query()
            ->where('order_status',0)
            ->paginate(6);
        return view('admin.deliver-confirm-order.index', compact('orders'));
    }

    public function confirm($id)
    {
        $orders = Order::find($id);
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('admin.deliver-confirm-order.confirm', compact('orders','order_details'));
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $clothes_qty = $request->clothes_qty;
        $clothes_price = $request->clothes_price;
        $clothes_total_price = $request->clothes_total_price;
        $total_qty = $request->total_qty;
        $order_id = $request->order_id;

        $orderDetail = OrderDetail::find($id);
        $original_qty = $orderDetail->clothes_qty;
        $current_qty = $clothes_qty;
        $cal_qty = $current_qty - $original_qty;
        $sum_qty = $cal_qty + $total_qty;

        $orderDetail->clothes_qty = $clothes_qty;

        $original_price =  $orderDetail->clothes_total_price;
        $current_price = $orderDetail->clothes_qty * $clothes_price;
        $sum = $clothes_total_price - $original_price;
        $current_total_price = $sum + $current_price;

        $orderDetail->clothes_total_price = $current_price;
        $orderDetail->update();

        $order = Order::find($order_id);
        $order->deliver_id = auth()->user()->id;
        $order->total_qty = $sum_qty;
        $order->total_price = $current_total_price;
//        echo $sum_qty."s".$current_total_price;
        $order->update();

        return redirect()->route('admin.confirm-order.confirm',[$order_id])->with('edit','แก้ไข'." ".$orderDetail->clothes->name);
    }

    public function editt(Request $request)
    {
        $orderDetail_id = $request->orderDetail_id;
        $clothes_qty = $request->clothes_qty;
        $clothes_price = $request->clothes_price;
        $clothes_total_price = $request->clothes_total_price;
        $total_qty = $request->total_qty;
        $order_id = $request->order_id;

        $orderDetail = OrderDetail::find($orderDetail_id);
        $previous_qty = $orderDetail->clothes_qty;
        $current_qty = $clothes_qty;
        $calculate_qty = $total_qty - $previous_qty;
        $sumQty = $current_qty + $calculate_qty;



        $orderDetail->clothes_qty = $clothes_qty;

        $previous_price = $orderDetail->clothes_total_price;
        $current_price = $orderDetail->clothes_qty * $clothes_price;
        $sum = $clothes_total_price - $previous_price;
        $current_total_price = $sum + $current_price;

        $order = Order::find($orderDetail->order_id);

        $orderDetail->clothes_total_price = $current_price;
        $orderDetail->update();

        $order = Order::find($order_id);
        $order->deliver_id = auth()->user()->id;
        $order->total_qty = $sumQty;
        $order->total_price = $current_total_price;
        $order->update();

        return redirect()->route('admin.confirm-order.confirm',[$order_id])->with('edit','แก้ไข'." ".$orderDetail->clothes->name);
    }

    public function destroy($id)
    {
        dd($id);
        $order_detatails = OrderDetail::find($id);
        $order_detatails->delete();
        return redirect()->route('.admin.confirm-order.index');
    }
}
