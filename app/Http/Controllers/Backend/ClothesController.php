<?php

namespace App\Http\Controllers\Backend;

use App\Clothes;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClothesRequest;
use App\ServiceType;
use Illuminate\Http\Request;

class ClothesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $search = "";
        $clothes = Clothes::paginate(6);
        return view('admin.clothes.index', compact('clothes','search'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == ""){
            $clothes = Clothes::query()
                ->where('id', '!=', 1)
                ->paginate(6);
            return view('admin.clothes.index',['clothes' => $clothes,'search' => $search]);
        }
        else{
            $clothes = Clothes::query()
                ->where('id', '!=', 1)
                ->where('name','LIKE','%'.$search.'%')
                ->paginate(6);
            $clothes->appends($request->only('search'));
            return view('admin.clothes.index',compact('clothes','search'));
        }
    }

    public function create()
    {
        $service_types = ServiceType::all();
        return view('admin.clothes.create',compact('service_types'));
    }

    public function store(ClothesRequest $request)
    {
//        dd($request->all());
        Clothes::create([
            'service_type_id' => $request['service_type_id'],
            'name' => $request['name'],
            'price' => $request['price'],
        ]);
       return redirect('admin/clothes/index')->with('success','เพิ่มเสื้อผ้าเรียบร้อย');
    }

    public function edit($id)
    {
        $data = Clothes::find($id);
        $service_types = ServiceType::all();
        return view('admin.clothes.edit', compact('data','service_types'));
    }

    public function update(ClothesRequest $request, $id)
    {
        $clothes = Clothes::find($id);
        $editAdmin = [
            'service_type_id' => $request['service_type_id'],
            'name' => $request['name'],
            'price' => $request['price'],
        ];
        $clothes->update($editAdmin);
        return redirect('admin/clothes/index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $clothes = Clothes::find($id);

        $clothes->delete();

        return redirect()->route('admin.clothes.index')->with('deleted','ลบเสื้อผ้าเรียบร้อย');
    }
}
