<?php

namespace App\Http\Controllers\BackendUser;

use App\Package;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $packages = Package::all();
        return view('backend-users.package.index', compact('packages'));
    }

    public function buy(Request $request)
    {



        return view('backend-users.package.index');
    }
}
