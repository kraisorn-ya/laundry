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
        $orders->pay_status = 2;
        $orders->update();

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "ลูกค้ารหัส: "." ".$orders->user_id." "."ส่งหลักฐานการโอนการแล้ว กรุณาตรวจสอบการโอนเงิน";
        $res = $this->notify_message($str,$token);

        return redirect()->route('users.order-details.index')->with('success','ส่งหลักฐานการโอนเงิน รอการตรวจสอบจากพนักงาน');
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
