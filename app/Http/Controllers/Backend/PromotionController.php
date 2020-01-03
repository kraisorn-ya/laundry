<?php

namespace App\Http\Controllers\Backend;

use App\Admin;
use App\ArticlesCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromotionEditRequest;
use App\Http\Requests\PromotionRequest;
use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $promotions = Promotion::paginate(6);
        return view('admin.promotion.index', compact('promotions'));
    }

    public function create()
    {
//        $article_categories  = ArticlesCategory::all();
        return view('admin.promotion.create');
    }

    public function store(PromotionRequest $request)
    {
//        dd($request->all());
        $promotion = new Promotion();
        $promotion->admin_id = Auth::user()->id;
        $promotion->title = $request->title;
        $promotion->discount = $request->discount;
        $promotion->description = $request->description;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->save();

        return redirect()->route('admin.promotion.index')->with('success','เพิ่มโปรโมชั่น');
    }

    public function edit($id)
    {
        $promotion = Promotion::find($id);
//        $article_categories  = ArticlesCategory::all();
        return view('admin.promotion.edit',compact('promotion'));
    }

    public function update(PromotionEditRequest $request, $id)
    {
        $promotion = Promotion::find($id);
        $promotion->admin_id = Auth::user()->id;
//        $promotion->articles_category_id = $request->articles_category_id;
        $promotion->title = $request->title;
        $promotion->discount = $request->discount;
        $promotion->description = $request->description;
        $promotion->start_date = $request->start_date;
        $promotion->end_date = $request->end_date;
        $promotion->update();

        return redirect()->route('admin.promotion.index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();
        return redirect()->route('admin.promotion.index')->with('deleted','ลบโปรโมชั่นเรียบร้อย');
    }
















//    public function getPromotion()
//    {
//        $about = [];
////        $oAbout = Promotion::get();
////        if ($oAbout->isNotEmpty()) {
////            $about = $oAbout;
////        }
////
////        return view('admin.promotion.index',compact('about'));
////    }

//    public function post(Request $request)
//    {
//
//        $id = $request->id;
//        if(!empty($id))
//        {
//            $promotion = Promotion::find($id);
//            $promotion->title = $request['title'];
//            $promotion->short_description = $request['short_description'];
//            $promotion->start_date = $request['start_date'];
//            $promotion->end_date = $request['end_date'];
//
//            $promotion->update();
//            return redirect('admin/promotion/index')->with('update','อัพเดทข้อมูลเรียบร้อย');
//        }
//        else
//        {
//            $promotion = new Promotion();
//            $promotion->title = $request['title'];
//            $promotion->short_description = $request['short_description'];
//            $promotion->start_date = $request['start_date'];
//            $promotion->end_date = $request['end_date'];
//            $promotion->save();
//            return redirect('admin/promotion/index')->with('success','โพสโปรโมชั่นเรียบร้อย');
//        }
//    }
}
