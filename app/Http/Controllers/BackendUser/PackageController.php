<?php

namespace App\Http\Controllers\BackendUser;

use App\Package;
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
}
