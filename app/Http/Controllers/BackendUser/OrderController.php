<?php

namespace App\Http\Controllers\BackendUser;

use App\Articles;
use App\Clothes;
use App\Http\Requests\OrderUser\OrderRequest;
use App\Http\Requests\Service\ServiceRequest;
use App\Order;
use App\OrderDetail;
use App\Service;
use App\ServiceType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function service()
    {
        $order = Order::all();
        $serviceTypes = ServiceType::all();
        return view('backend-users.order.service', compact('serviceTypes','order'));
    }

    public function confirm(Request $request)
    {

        $this->validate($request, [
            'pay_status' => 'required',
        ], [], [
            'pay_status' => 'วิธีการชำระเงิน',
        ]);
        $address = $request->address;
        $pay_status = $request->pay_status;
        $orders = $request->all();
        $service_types = ServiceType::all();
        $order_details = [];

        foreach ($service_types as $service_type)
        {
            $clothes = Clothes::query()
                ->where('service_type_id',$service_type->id)
                ->get();
            foreach ($clothes as $clothe)
            {
                if ($orders['clothe_qty_'.$clothe->id] != null)
                {
                    $qty = $orders['clothe_qty_'.$clothe->id];
                    $price = $orders['clothe_price_'.$clothe->id];

                    $total_price = $qty*$price;
                    array_push(
                        $order_details,array(
                            'clothe_id' => $orders['clothe_id_'.$clothe->id],
                            'clothe_name' => $orders['clothe_name_'.$clothe->id],
                            'clothe_qty' => $orders['clothe_qty_'.$clothe->id],
                            'clothe_price' => $orders['clothe_price_'.$clothe->id] ,
                            'service_type_id' => $orders['service_type_'.$clothe->id] ,
                            'clothe_total_price' => $total_price ,
                        )
                    );

                }
            }
        }
        $sum_qty = 0;
        $sum_price = 0;
        foreach($order_details as $order_detail)
        {
            $sum_qty+= $order_detail['clothe_qty'];
            $sum_price+= $order_detail['clothe_total_price'];
        }
        return view('backend-users.order.confirm',compact('sum_qty','sum_price','order_details','address','pay_status'));
    }

    public function store(Request $request)
    {
        $order = new Order;
        $sum_qty = 0;
        $sum_price = 0;
        $orders = $request->all();
        $address = $request->address;
        $pay_status = $request->pay_status;
        array_shift($orders);
        array_pop($orders);
        array_pop($orders);
        foreach($orders as $data)
        {
            $sum_qty+= $data['clothe_qty'];
            $sum_price+= $data['clothe_total_price'];
        }
        $order->user_id = auth::user()->id;
        $order->total_price = $sum_price;
        $order->total_qty = $sum_qty;
        $order->order_status = 0;
        $order->address = $address;
        $order->pay_status = $pay_status;
        $order->save();

        foreach ($orders as $order_detail)
        {
            $order_details = new OrderDetail;

            $order_details->order_id = $order->id;
            $order_details->clothes_id = $order_detail['clothe_id'];
            $order_details->clothes_qty = $order_detail['clothe_qty'];
            $order_details->service_type_id = $order_detail['service_type_id'];
            $order_details->clothes_total_price = $order_detail['clothe_total_price'];
            $order->order_details()->save($order_details);
        }

        define('LINE_API',"https://notify-api.line.me/api/notify");
        $token = "bKrbgXDDt7wPBFvcMpqVS8a5o9Ucdxls3IoW8cpizTJ";
        $str = "ลูกค้า ID :".auth()->user()->id." เรียกใช้บริการ";
        $res = $this->notify_message($str,$token);
        print_r($res);


        return redirect()->route('home')->with('success','บันทึกรายการเรียบร้อย');
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
