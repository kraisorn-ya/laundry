<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Http\Requests\EmployeeEditRequest;
use App\Order;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $sumtodays = Order::where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
            ->orderBy('created_at','desc')
            ->get();
        $sum = Order::query()
            ->orderBy('created_at','desc')
            ->where('order_status','5')
            ->get();
        $users = User::all();
        return view('admin.home', compact('users','sumtodays','sum'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $roles = Role::all();
        $data = Admin::find($id);
        return view('admin.profile',compact('data','roles'));
    }

    public function edit()
    {
        $data = auth()->user();
        return view('admin.edit', compact('data'));
    }

    public function update(EmployeeEditRequest $request)
    {
        $id = Auth::user()->id;
        $admin = Admin::find($id);
        $admin->username = $request['username'];
        $admin->email = $request['email'];
        $admin->first_name = $request['first_name'];
        $admin->last_name = $request['last_name'];
        $admin->gender = $request['gender'];
        $admin->id_card = $request['id_card'];
        $admin->tel = $request['tel'];
        $admin->birthday = $request['birthday'];
        $admin->address = $request['address'];
//        $admin->salary = $request['salary'];
//        $admin->role_id = $request['role_id'];

        if (isset($request['image'])){
            Storage::delete('public/'.$admin->image);
            $admin->image = ($request['image'])->store('uploads','public');
        }
        if (!empty($request->password))
        {
            $newPassword = Hash::make($request['password']);
            $admin->password = $newPassword;
        }
        $admin->update();
        return redirect('admin/employee/index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

}
