<?php

namespace App\Http\Controllers\Backend;

use App\Articles;
use App\ArticlesCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesEditRequest;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    public function index()
    {
        $articles = Articles::paginate(6);
        return view('admin.articles.index',compact('articles'));
    }

    public function create()
    {
        $article_categories = ArticlesCategory::all();
        return view('admin.articles.create',compact('article_categories'));
    }

    public function store(ArticlesRequest $request)
    {
        $articles = new Articles;
        $articles->admin_id = Auth::user()->id;
        $articles->articles_category_id = $request['articles_category_id'];
        $articles->title = $request['title'];
        $articles->short_description = $request['short_description'];
        $articles->description = $request['description'];
        $articles->image = $request['image']->store('uploads','public');
        $articles->save();
        return redirect()->route('admin.articles.index')->with('success','เพิ่มข่าวสาร');
    }

    public function edit($id)
    {
        $data = Articles::find($id);
        $article_categories  = ArticlesCategory::all();

//        foreach ($articles_categories as $articles_category)
//        {
//            echo $data->articles_category_id." = ".$articles_category->id."<br>";
//        }

        return view('admin.articles.edit',compact('data','article_categories'));
    }

    public function update(ArticlesEditRequest $request, $id)
    {
//        dd($request);
        $articles = Articles::find($id);
        $articles->admin_id = Auth::user()->id;
        $articles->articles_category_id = $request['articles_category_id'];
        $articles->title = $request['title'];
        $articles->short_description = $request['short_description'];
        $articles->description = $request['description'];

        if (isset($request['image'])){
            Storage::delete('public/'.$articles->image);
            $articles->image = ($request['image'])->store('uploads','public');
        }
        $articles->update();
        return redirect()->route('admin.articles.index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $articles = Articles::find($id);
        $articles->delete();
        Storage::delete('public/'.$articles->image);
        return redirect()->route('admin.articles.index')->with('deleted','ลบประเภทข่าวสารเรียบร้อย');
    }
}
