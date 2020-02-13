<?php

namespace App\Http\Controllers\Backend\Deliver;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfirmOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $orders = Order::query()
            ->where('order_status',0)
            ->paginate(6);
        return view('admin.deliver.index', compact('orders'));
    }
}
