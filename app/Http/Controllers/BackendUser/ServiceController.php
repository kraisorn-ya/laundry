<?php

namespace App\Http\Controllers\BackendUser;

use App\Http\Requests\Service\ServiceRequest;
use App\Service;
use App\ServiceType;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

        return view('backend-users.service.index',compact('service_types'));
    }
}
