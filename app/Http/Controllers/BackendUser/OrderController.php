<?php

namespace App\Http\Controllers\BackendUser;

use App\Articles;
use App\Clothes;
use App\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $service_types = ServiceType::all();
//        $clothes = Clothes::query()
//            ->where('service_type_id',$service_types->id)
//            ->get();
//        foreach ($service_types as $service_type)
//        {
//            $service_type->id;
//            echo $service_type->name." <br>";
//            $clothes = Clothes::query()
//                ->where('service_type_id',$service_type->id)
//            ->get();
//            foreach ($clothes as $clothe)
//            {
//                echo $clothe->name."<br>";
//            }
//            echo "<hr>";
//        }
//        $service_type1 = ServiceType::query()
//            ->where('id','1')
//            ->get();

        return view('backend-users.order.index',compact('service_types'));
    }
}
