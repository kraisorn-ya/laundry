<?php

namespace App\Http\Controllers\BackendUser;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AllOrderDetailsController extends Controller
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
            ->where('order_status','5')
            ->paginate(6);
        return view('backend-users.all-order-details.index',compact('orders'));
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('backend-users.all-order-details.details',compact('order_details'));
    }
}
