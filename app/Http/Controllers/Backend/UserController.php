<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $search = "";
        $users = User::paginate(6);
        return view('admin.users.index', compact('users','search'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == ""){
            $users = User::paginate(6);
            return view('admin.users.index',compact('users','search'));
        }
        else{
            $users = User::query()
                ->where('first_name','LIKE','%'.$search.'%')
//                ->where('last_name','LIKE','%'.$search.'%')
                ->paginate(6);
            $users->appends($request->only('search'));
            return view('admin.users.index',compact('users','search'));
        }
    }

    public function store(UserRequest $request)
    {
        User::create([
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
            'image' => $request['image']->store('uploads','public'),
            'status_id' => '1',

        ]);
        return redirect('admin/users/index')->with('success','เพิ่มสมาชิกเรียบร้อย');
    }

    public function edit($id)
    {
        $data = User::find($id);
//        $status = Status::all();
        return view('admin.users.edit', compact('data'));
    }

    public function update(UserEditRequest $request, $id)
    {
//        dd($request);
        $user = User::find($id);
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->gender = $request['gender'];
        $user->id_card = $request['id_card'];
        $user->tel = $request['tel'];
        $user->birthday = $request['birthday'];
        $user->address = $request['address'];
//        $user->status_id = $request['status_id'];

        if (!empty($request->password)) {
            $newPassword = Hash::make($request['password']);
            $user->password  = $newPassword;
        }
        if (isset($request['image'])){
            Storage::delete('public/'.$user->image);
            $user->image = ($request['image'])->store('uploads','public');
        }

        $user->update();
        return redirect()->route('admin.users.index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->forcedelete();
        Storage::delete('public/'.$user->image);
        return redirect()->route('admin.users.index')->with('deleted','ลบพนักงานเรียบร้อย');
    }
}
