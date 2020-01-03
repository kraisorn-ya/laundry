<?php

namespace App\Http\Controllers\Frontend;

use App\Articles;
use App\ArticlesCategory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index($name = null)
    {

        $category = null;
        $categories = ArticlesCategory::all();
        $query_articles = Articles::where('created_at','<=', Carbon::now())
            ->orderBy('created_at','desc');

        if ($name != null) {
            $category = ArticlesCategory::query()->where('name', $name)->first();
            if ($category == null) {
                return redirect()->route('articles');
            }
        }

        if ($category != null) {
            $query_articles->where('articles_category_id', $category->id);
        }

        $articles = $query_articles->paginate(5);

        return view('frontend.articles.index',compact('articles','categories','category'));

    }

    public function content($id)
    {
        $article = Articles::find($id);

        return view('frontend.articles.content',compact('article'));
    }
}
