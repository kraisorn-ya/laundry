<?php

namespace App\Http\Controllers\backend;

use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderDetailsDailyController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $orders = Order::query()
            ->where('order_status',5)
//            ->where('updated_at', '>=', $now.' 00:00:00')
//            ->where('updated_at', '<=', $now.' 23:59:59')
            ->where('updated_at', '>=', $now.' 00:00:00')
            ->where('updated_at', '<=', $now.' 23:59:59')
            ->paginate(6);
        return view('admin.order-details-daily.index', compact('orders'));
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('admin.order-details-daily.details',compact('order_details'));
    }
}
