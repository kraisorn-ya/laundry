<?php

namespace App\Http\Controllers\Backend\Deliver;

use App\Clothes;
use App\Order;
use App\OrderDetail;
use App\ServiceType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DeliverController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $search = "";
        $orders = Order::query()
            ->where('order_status', 0)
            ->paginate(6);
        return view('admin.deliver.index', compact('orders', 'search'));
    }

    public function create($id)
    {
        $order = Order::find($id);
        $serviceTypes = ServiceType::all();
        return view('admin.deliver.create', compact('serviceTypes', 'order'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == "") {
            $orders = Order::query()
                ->where('order_status', 0)
                ->paginate(6);
            return view('admin.deliver.index', compact('orders', 'search'));
        } else {
            $orders = Order::query()
                ->where('order_status', 0)
                ->where('user_id', 'LIKE', '%' . $search . '%')
                ->paginate(6);
            $orders->appends($request->only('search'));
            return view('admin.deliver.index', compact('orders', 'search'));
        }
    }

    public function confirm(Request $request, $id)
    {
        $this->validate($request, [
            'date_completed' => 'required',
//            'pay_status' => 'required',
        ], [], [
            'date_completed' => 'วันที่เสร็จสิ้น',
//            'pay_status' => 'สถานะชำระเงิน',
        ]);
//        $pay_status = $request->pay_status;
        $order_date = $request->date_completed;
        $order_id = $request->order_id;
        $user = User::find($id);
        $orders = $request->all();
        $service_types = ServiceType::all();
        $order_details = [];

        foreach ($service_types as $service_type) {
            $clothes = Clothes::query()
                ->where('service_type_id', $service_type->id)
                ->get();
            foreach ($clothes as $clothe) {
                if ($orders['clothe_qty_' . $clothe->id] != null) {
                    $qty = $orders['clothe_qty_' . $clothe->id];
                    $price = $orders['clothe_price_' . $clothe->id];

                    $total_price = $qty * $price;
//                    echo $total_price."<br>";
//                    echo "id :".$orders['clothe_id_'.$clothe->id]." ชื่อ".$orders['clothe_name_'.$clothe->id]." จำนวน :".$qty." ราคารวม ".$total_price." <br>";

                    array_push(
                        $order_details, array(
                            'clothe_id' => $orders['clothe_id_' . $clothe->id],
                            'clothe_name' => $orders['clothe_name_' . $clothe->id],
                            'clothe_qty' => $orders['clothe_qty_' . $clothe->id],
                            'clothe_price' => $orders['clothe_price_' . $clothe->id],
                            'service_type_id' => $orders['service_type_' . $clothe->id],
                            'clothe_total_price' => $total_price,
                        )
                    );

                }
            }
        }
        $sum_qty = 0;
        $sum_price = 0;
        foreach ($order_details as $order_detail) {
            $sum_qty += $order_detail['clothe_qty'];
            $sum_price += $order_detail['clothe_total_price'];
        }
        return view('admin.deliver.confirm', compact('sum_qty', 'sum_price', 'order_details', 'user', 'order_id', 'order_date'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $sum_qty = 0;
        $sum_price = 0;
        $orders = $request->all();
//        $pay_status = $request->pay_status;
        $date_completed = $request->date_completed;

        array_shift($orders);
        array_pop($orders);
//        array_pop($orders);
        foreach ($orders as $data) {
            $sum_qty += $data['clothe_qty'];
            $sum_price += $data['clothe_total_price'];
        }
        $order->admin_id = Auth::user()->id;
        $order->total_price = $sum_price;
        $order->total_qty = $sum_qty;
        $order->order_status = 1;
        $order->date_completed = $date_completed;
//        $order->pay_status = $pay_status;
        $order->update();

        foreach ($orders as $order_detail) {
            $order_details = new OrderDetail;

            $order_details->order_id = $order->id;
            $order_details->clothes_id = $order_detail['clothe_id'];
            $order_details->clothes_qty = $order_detail['clothe_qty'];
            $order_details->service_type_id = $order_detail['service_type_id'];
            $order_details->clothes_total_price = $order_detail['clothe_total_price'];
            $order->order_details()->save($order_details);
        }
        return redirect()->route('admin.deliver.index')->with('success', 'บันทึกรายการเรียบร้อย');
    }

    public function detail($id)
    {
        $orders = Order::find($id);
        return view('admin.deliver.detail', compact('orders'));
    }

    public function destroy($id)
    {
        $orders = Order::find($id);
        if ($orders->image != null) {
            Storage::delete('public/' . $orders->image);
        }
        $orders->delete();


        return redirect()->route('admin.deliver.index')->with('deleted', 'ลบข้อมูลเรียกใช้บริการเรียบร้อย');
    }
}
