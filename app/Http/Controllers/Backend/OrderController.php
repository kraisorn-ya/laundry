<?php

namespace App\Http\Controllers\Backend;

use App\Clothes;
use App\Service;
use App\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $services = Service::query()
        ->paginate(6);
        return view('admin.order.index', compact('services'));
//        $serviceTypes = ServiceType::all();
//        return view('admin.order.index', compact('serviceTypes'));
    }

    public function create()
    {
//        $admin_roles = Service::find($id);
//        $admin_roles->admin_id = Auth::user()->id;
//
//        $admin_roles->update();

        $serviceTypes = ServiceType::all();
        return view('admin.order.create', compact('serviceTypes'));
    }

    public function confirm(Request $request)
    {
//        dd($request->all());
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
//                    echo $total_price."<br>";
//                    echo "id :".$orders['clothe_id_'.$clothe->id]." ชื่อ".$orders['clothe_name_'.$clothe->id]." จำนวน :".$qty." ราคารวม ".$total_price." <br>";

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
      dd($order_details);
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service->image != null)
        {
            Storage::delete('public/'.$service->image);
        }
        $service->delete();


        return redirect()->route('admin.order.index')->with('deleted','ลบพนักงานเรียบร้อย');
    }
}
