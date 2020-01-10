<?php

namespace App\Http\Controllers\Backend\ConfirmPackage;

use App\Package;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfirmPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
//        $packages = Package::all();
//        $package = User::query()
//            ->where('package_id',$packages->id)
//            ->get();
//
//        echo $package;


//        foreach ($packages as $package)
//        {
//            $package->id;
//            echo $package->name." <br>";
//            $users = User::query()
//                ->where('package_id',$package->id)
//            ->get();
//            foreach ($users as $user)
//            {
//                $user = User::query()
//                    ->where('/')
//                    ->get();
//                echo $user->name."<br>";
//            }
//            echo "<hr>";
//        }
        $users = User::all();

        return view('admin.confirm-package.index',compact('users'));
    }
}
