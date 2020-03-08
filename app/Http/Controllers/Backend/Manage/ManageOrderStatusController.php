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
            ->where('order_status','!=',1)
            ->where('order_status','!=',4)
            ->where('order_status','!=',5)
            ->paginate(6);
        return view('admin.manage-status.index',compact('orders'));
    }


    public function pay($id)
    {
        $orders = Order::find($id);
        return view('admin.manage-status.pay-status',compact('orders'));
    }

    public function orderStatus($id)
    {
        $orders = Order::find($id);
        if ($orders->order_status == 2){
            $orders->order_status = 3;
        }
        $orders->update();
        return redirect()->route('admin.manage-status.index');
    }

    public function deliverStatus($id)
    {
        $orders = Order::find($id);
        if ($orders->order_status == 3){
            $orders->order_status = 4;
        }
        $orders->update();

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "เตรียมส่งเสื้อผ้าของลูกค้ารหัส :".$orders->user_id;
        $res = $this->notify_message($str,$token);

        return redirect()->route('admin.manage-status.index')->with('success','แจ้งเตือนพนักงานรับ-ส่ง ไปส่งเสื้อผ้าของคุณ:'." ".$orders->users->first_name." ".$orders->users->last_name);
    }

    public function payStatus($id)
    {
        $orders = Order::find($id);
        $orders->pay_status = 3;
        $orders->update();

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "ยืนยันการชำระเงินของลูกค้ารหัส :".$orders->user_id." เรียบร้อย";
        $res = $this->notify_message($str,$token);

        return redirect()->route('admin.manage-status.index')->with('success','ยืนยันการชำระเงิน');
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('admin.manage-status.detail',compact('order_details'));
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
