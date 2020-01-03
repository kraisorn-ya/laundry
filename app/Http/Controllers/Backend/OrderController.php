<?php

namespace App\Http\Controllers\Backend;

use App\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $serviceTypes = ServiceType::all();
        return view('admin.order.index', compact('serviceTypes'));
    }
}
