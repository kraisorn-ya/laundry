<?php

namespace App\Http\Controllers\Backend;

use App\ArticlesCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCategoryRequest;
use App\Http\Requests\ArticlesCategoryEditRequest;
use Illuminate\Http\Request;

class ArticlesCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:admin');
    }
    public function index()
    {
        $article_categories = ArticlesCategory::paginate(6);
        return view('admin.articles-category.index',compact('article_categories'));
    }

    public function create()
    {
        return view('admin.articles-category.create');
    }

    public function store(ArticleCategoryRequest $request)
    {
        ArticlesCategory::create([
            'name' => $request['name'],
        ]);
        return redirect()->route('admin.article-category.index')->with('success','เพิ่มประเภทข่าวสาร');
    }

    public function edit($id)
    {
        $service_type = ArticlesCategory::find($id);
        return view('admin.articles-category.edit',compact('service_type'));
    }

    public function update(ArticlesCategoryEditRequest $request, $id)
    {
        $category = ArticlesCategory::find($id);
        $category->name = $request['name'];
        $category->update();
        return redirect()->route('admin.article-category.index')->with('edit','แก้ไขข้อมูลเรียบร้อย');
    }

    public function destroy($id)
    {
        $article_category = ArticlesCategory::find($id);

       $article_category->delete();

        return redirect()->route('admin.article-category.index')->with('deleted','ลบประเภทข่าวสารเรียบร้อย');
    }
}
