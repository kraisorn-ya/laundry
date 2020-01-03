<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Http\Requests\EmployeeEditRequest;
use App\Role;
use App\User;
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
        $users = User::all();
        return view('admin.home', compact('users'));
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
