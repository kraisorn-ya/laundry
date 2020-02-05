<?php

namespace App\Http\Controllers\backend;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrderDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $dateStart = "";
        $dateEnd = "";
        $orders = Order::query()
           ->where('order_status','5')
           ->paginate(6);
        return view('admin.order-details.index',compact('orders','dateStart','dateEnd'));
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('admin.order-details.details',compact('order_details'));
    }

    public function search(Request $request)
    {
        $dateStart = $request->dateStart;
        $dateEnd = $request->dateEnd;

        if ($dateStart == null && $dateEnd == null)
        {
            $orders = Order::query()
                ->where('order_status','5')
                ->paginate('6');
            return view('admin.order-details.index',compact('orders','dateStart','dateEnd'));
        }
        else{
            $dateStartQ = date('Y/m/d',strtotime($request->dateStart)) ;
            $dateEndQ = date('Y/m/d',strtotime($request->dateEnd.'+ 1 days')) ;

            $orders = Order::query()
                ->whereBetween('created_at',[$dateStartQ,$dateEndQ])
                ->where('order_status','5')
                ->paginate('6');

            $orders->appends(Input::except('page'));

            $dateStart = date('d/m/Y',strtotime($dateStartQ)) ;
            $dateEnd = date('d/m/Y',strtotime($dateEndQ.'- 1 days')) ;

            return view('admin.order-details.index',compact('orders','dateStart','dateEnd'));
        }
    }
}
