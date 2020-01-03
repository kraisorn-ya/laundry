<?php

namespace App\Http\Controllers\Frontend;

use App\Clothes;
use App\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceChargeController extends Controller
{
    public function index()
    {
//        $clothes = Clothes::all();
        $service_type = ServiceType::all();
        return view('frontend.service-charge.index',compact('service_type'));
    }

    public function index2()
    {
        $service_type = null;
        $service_types = ServiceType::all();
        $clothes = Clothes::all();

        return view('frontend.service-charge.index2', compact('service_type','service_types','clothes'));
    }
}
