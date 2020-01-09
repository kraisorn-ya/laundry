<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Package\PackageEditRequest;
use App\Http\Requests\Package\PackageRequest;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }
    public function create()
    {
        return view('admin.package.create');
    }

    public function store(PackageRequest $request)
    {
        $package = new Package;
        $package->name = $request['name'];
        $package->number = $request['number'];
        $package->price = $request['price'];
        $package->save();

        return redirect()->route('admin.package.index')->with('success','เพิ่มแพ็คเกจ');
    }

    public function edit($id)
    {
        $data = Package::find($id);
        return view('admin.package.edit', compact('data'));
    }

    public function update(PackageEditRequest $request, $id)
    {
        $package = Package::find($id);
        $package->name = $request['name'];
        $package->number = $request['number'];
        $package->price = $request['price'];
        $package->update();

        return redirect()->route('admin.package.index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('admin.package.index')->with('deleted','ลบแพ็คเกจเรียบร้อย');
    }
}
