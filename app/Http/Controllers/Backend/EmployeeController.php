<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $search = "";
        $admins = Admin::query()
            ->where('id','!=','1')
            ->paginate(6);
        return view('admin.employee.index', compact('admins','search'));
    }
    public function create()
    {
        $roles = Role::query()
        ->where('id','!=','1')
         ->get();
        return view('admin.employee.create', compact('roles'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == ""){
            $admins = Admin::query()
                ->where('id', '!=', 1)
                ->paginate(6);
            return view('admin.employee.index',['admins' => $admins,'search' => $search]);
        }
        else{
            $admins = Admin::query()
                ->where('id', '!=', 1)
                ->where('first_name','LIKE','%'.$search.'%')
//                ->where('last_name','LIKE','%'.$search.'%')
                ->paginate(6);
            $admins->appends($request->only('search'));
            return view('admin.employee.index',compact('admins','search'));
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $this->validateCreate($data)->validate();
        Admin::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'gender' => $request['gender'],
            'id_card' => $request['id_card'],
            'tel' => $request['tel'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'role_id' => $request['role_id'],
            'image' => $request['image']->store('uploads','public'),
        ]);
        return redirect('admin/employee/index')->with('success','เพิ่มพนักงานเรียบร้อย');
    }
    protected function validateCreate(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50', 'unique:admin'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admin'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', 'max:50'],
            'id_card' => ['required','string','max:20'],
            'tel' => ['required','string','max:20'],
            'birthday' => ['required'],
            'address' => ['required','string','max:255'],
            'role_id' => ['required'],
            'image' => ['required', 'file', 'image', 'max:5000'],
        ],[
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'username.unique' => 'ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'ใส่รหัสผ่าน 6 ตัวขึ้นไป',
            'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'อีเมลนี้มีอยู่ในระบบแล้ว',
            'first_name.required'  => 'กรุณากรอกชื่อ',
            'last_name.required'  => 'กรุณากรอกนามสกุล',
            'gender.required'  => 'กรุณาเลือกเพศ',
            'id_card.required'  => 'กรุณากรอกเลขบัตรประชาชน',
            'tel.required'  => 'กรุณากรอกเบอร์โทรศัพท์',
            'birthday.required'  => 'กรุณากรอกวันเกิด',
            'address.required'  => 'กรุณากรอกที่อยู่',
            'role_id.required'  => 'กรุณากรอกตำแหน่ง',
            'image.required'  => 'กรุณาใส่รูปภาพ',
        ]);
    }

    public function edit($id)
    {
        $data = Admin::find($id);
        $roles = Role::query()
        ->where('id','!=','1')
        ->get();
        return view('admin.employee.edit', compact('data','roles'));
    }
    public function update(Request $request, $id)
    {

        $editAdmin = [
            'username' => $request['username'],
            'email' => $request['email'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'gender' => $request['gender'],
            'id_card' => $request['id_card'],
            'tel' => $request['tel'],
            'birthday' => $request['birthday'],
            'address' => $request['address'],
            'role_id' => $request['role_id'],
        ];
        $data = [
            'username' => "required|string|max:50|unique:admin,username,$id",
//            'password' => 'nullable|string|min:6|confirmed',
            'email' => "required|email|max:255|unique:admin,email,$id",
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|string|max:50',
            'id_card' => 'required|string|max:20',
            'tel' => 'required|string|max:20',
            'birthday' => 'required',
            'address' => 'required|string|max:255',
            'role_id' => 'required',
            ];
        $rules = [
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'username.unique' => 'ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.unique' => 'อีเมลนี้มีอยู่ในระบบแล้ว',
            'first_name.required'  => 'กรุณากรอกชื่อ',
            'last_name.required'  => 'กรุณากรอกนามสกุล',
            'gender.required'  => 'กรุณาเลือกเพศ',
            'id_card.required'  => 'กรุณากรอกเลขบัตรประชาชน',
            'tel.required'  => 'กรุณากรอกเบอร์โทรศัพท์',
            'birthday.required'  => 'กรุณากรอกวันเกิด',
            'address.required'  => 'กรุณากรอกที่อยู่',
            'role_id.required'  => 'กรุณากรอกตำแหน่ง',
            'image.required'  => 'กรุณาใส่รูปภาพ',
        ];

        if (!empty($request['image'])) {
            $data += ['image' => ['required', 'file', 'image', 'max:5000'],];
        };

        $this->validate($request, $data, $rules);


        $admin = Admin::find($id);

        if(isset($request['image']))
        {
            Storage::delete('public/'.$admin->image);
            $editAdmin += [ 'image' => ($request['image'])->store('uploads','public')];
        }

        if (!empty($request->password))
        {
            $newPassword = Hash::make($request['password']);
            $admin->password = $newPassword;
        }
        $admin->update($editAdmin);
        return redirect('admin/employee/index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->forcedelete();
        Storage::delete('public/'.$admin->image);
        return redirect()->route('admin.employee.index')->with('deleted','ลบพนักงานเรียบร้อย');
    }


}
