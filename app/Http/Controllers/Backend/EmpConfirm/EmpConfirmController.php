<?php

namespace App\Http\Controllers\Backend\EmpConfirm;

use App\Http\Requests\EmpConfirm\EmpConfirmRequest;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpConfirmController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $orders = Order::query()
            ->where('order_status',1)
            ->paginate(6);
        return view('admin.emp-confirm-order.index', compact('orders'));
    }

    public function confirm($id)
    {
        $orders = Order::find($id);
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('admin.emp-confirm-order.confirm', compact('orders','order_details'));
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

//        $order_noti = Order::find($order_id);

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "แก้ไขจำนวนรายการ :".$orderDetail->clothes->name."  ".$clothes_qty."ชิ้น ของรหัสลูกค้า:".$orderDetail->orders->user_id;
        $res = $this->notify_message($str,$token);
        print_r($res);

        $orderDetail->clothes_total_price = $current_price;
        $orderDetail->update();

        $order = Order::find($order_id);
        $order->admin_id = auth()->user()->id;
        $order->total_qty = $sum_qty;
        $order->total_price = $current_total_price;
        $order->update();

        return redirect()->route('admin.emp-confirm-order.confirm',[$order_id])->with('edit','แก้ไข'." ".$orderDetail->clothes->name);
    }

    public function orderStatus($id, Request $request)
    {
        $this->validate($request, [
            'date_completed' => 'required',
        ], [], [
            'date_completed' => 'วันที่เสร็จ',
        ]);

        $date_completed = $request->date_completed;
        $order = Order::find($id);
        $order->admin_id = auth()->user()->id;
        $order->order_status = 2;
        $order->date_completed = $date_completed;
        $order->update();

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "ทางร้านกำลังดำเนินการซักเสื้อผ้าของลูกค้ารหัส"." ".$order->user_id;
        $res = $this->notify_message($str,$token);

        return redirect()->route('admin.emp-confirm-order.index')->with('success','ดำเนินการซักเสื้อผ้า');
    }

    public function destroy($id)
    {
        $order_details = OrderDetail::find($id);
        $total_qty = $order_details->orders->total_qty - $order_details->clothes_qty;
        $total_price = $order_details->orders->total_price - $order_details->clothes_total_price;

        $order_id = $order_details->order_id = $order_details->orders->id;

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "ลบรายการ :".$order_details->clothes->name."ชิ้น ของรหัสลูกค้า:".$order_details->orders->user_id;
        $res = $this->notify_message($str,$token);
        print_r($res);

        $order = Order::find($order_id);
        $order->total_qty = $total_qty;
        $order->total_price = $total_price;
        $order->admin_id = auth()->user()->id;
        $order->update();

        $order_details->delete();

        return redirect()->route('admin.emp-confirm-order.confirm',[$order_id])->with('deleted','ลบรายการ'." ".$order_details->clothes->name);
    }

    public function notify_message($message,$token)
    {
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    ."Authorization: Bearer ".$token."\r\n"
                    ."Content-Length: ".strlen($queryData)."\r\n"
            ,'content' => $queryData
            ),
        );
        $context = stream_context_create($headerOptions);
        file_get_contents(LINE_API,FALSE,$context);
//        $result = file_get_contents(LINE_API,FALSE,$context);
//        $res = json_decode($result);
//        return $res;
    }
}
