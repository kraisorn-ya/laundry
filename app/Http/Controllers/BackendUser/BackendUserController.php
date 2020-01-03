<?php

namespace App\Http\Controllers\BackendUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BackendUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        $id = auth()->user()->id;
        $data = User::find($id);
        return view('backend-users.profile-user',compact('data'));
    }
    public function edit()
    {
        $data = auth()->user();
        return view('backend-users.user-edit',compact('data'));
    }
    public function update(UserEditRequest $request)
    {
        $id = auth()->user()->id;
        $users = User::find($id);
        $users->username = $request['username'];
        $users->email = $request['email'];
        $users->first_name = $request['first_name'];
        $users->last_name = $request['last_name'];
        $users->gender = $request['gender'];
        $users->id_card = $request['id_card'];
        $users->tel = $request['tel'];
        $users->birthday = $request['birthday'];
        $users->address = $request['address'];

        if (isset($request['image'])){
            Storage::delete('public/'.$users->image);
            $users->image = ($request['image'])->store('uploads','public');
        }
        if(!empty($request->password))
        {
            $newPassword = Hash::make($request['password']);
            $users->password = $newPassword;
        }
        $users->update();
        return redirect('home')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }
}
