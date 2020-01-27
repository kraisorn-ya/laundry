<?php

namespace App\Http\Controllers\Backend\Manage;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ManageOrderStatusController extends Controller
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
        return view('admin.manage-status.index',compact('orders'));
    }

    public function status($id)
    {
        $orders = Order::find($id);
        return view('admin.manage-status.status',compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->order_status = $request->order_status;
        $orders->update();

        return redirect()->route('admin.manage-status.index')->with('success','แก้ไขสถานะเสร็จสิ้น');
    }

    public function pay($id)
    {
        $orders = Order::find($id);
        return view('admin.manage-status.pay-status',compact('orders'));
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
        $orders->update();
        return redirect()->route('admin.manage-status.index');
    }

    public function sendStatus($id)
    {
        $orders = Order::find($id);
        $orders->send_status = 1;
        $orders->update();

        return redirect()->route('admin.manage-status.index');
    }

    public function payStatus($id)
    {
        $orders = Order::find($id);
        $orders->pay_status = 2;
        $orders->update();

        return redirect()->route('admin.manage-status.index');
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('admin.manage-status.detail',compact('order_details'));
    }

    public function destroy($id)
    {
        $orders = Order::find($id);
        if ($orders->image != null)
        {
            Storage::delete('public/'.$orders->image);
        }
        $orders->delete();


        return redirect()->route('admin.manage-status.index')->with('deleted','ลบข้อมูลเรียกใช้บริการเรียบร้อย');
    }
}
