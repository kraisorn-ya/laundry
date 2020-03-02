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
            ->where('order_status','=',4)
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
        if ($orders->order_status == 4){
            $orders->order_status = 5;
        }
        $orders->pay_status = 3;
        $orders->update();

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "ส่งเสื้อผ้าของลูกค้ารหัส :".$orders->user_id." เรียบร้อยแล้ว";
        $res = $this->notify_message($str,$token);

        return redirect()->route('admin.order-success.index')->with('success','ส่งเสื้อผ้าให้ลูกค้าเรียบร้อยแล้ว');
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('admin.order-success.detail', compact('order_details'));
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
