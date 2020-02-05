<?php

namespace App\Http\Controllers\BackendUser;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AllOrderDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dateStart = "";
        $dateEnd = "";
        $users = Auth::user()->id;
        $orders = Order::query()
            ->where('user_id',$users)
            ->where('order_status','5')
            ->paginate(6);
        return view('backend-users.all-order-details.index',compact('orders','dateStart','dateEnd'));
    }

    public function details($id)
    {
        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();
        return view('backend-users.all-order-details.details',compact('order_details'));
    }

    public function search(Request $request)
    {
        $users = Auth::user()->id;
        $dateStart = $request->dateStart;
        $dateEnd = $request->dateEnd;

        if ($dateStart == null && $dateEnd == null)
        {
            $orders = Order::query()
                ->where('user_id',$users)
                ->where('order_status','5')
                ->paginate(6);
            return view('backend-users.all-order-details.index',compact('orders','dateStart','dateEnd'));
        }
        else{
            $dateStartQ = date('Y/m/d',strtotime($request->dateStart)) ;
            $dateEndQ = date('Y/m/d',strtotime($request->dateEnd.'+ 1 days')) ;

            $orders = Order::query()
                ->where('user_id',$users)
                ->whereBetween('created_at',[$dateStartQ,$dateEndQ])
                ->where('order_status','5')
                ->paginate('6');

            $orders->appends(Input::except('page'));

            $dateStart = date('d/m/Y',strtotime($dateStartQ)) ;
            $dateEnd = date('d/m/Y',strtotime($dateEndQ.'- 1 days')) ;

            return view('backend-users.all-order-details.index',compact('orders','dateStart','dateEnd'));
        }
    }
}
