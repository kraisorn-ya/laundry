<?php

namespace App\Http\Controllers\Frontend;

use App\Articles;
use App\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function index()
    {
//        $id = Articles::find($id);
        $articles = Articles::query()
//            ->where('id',$id)
            ->where('created_at' ,'<=', Carbon::now())
            ->limit(4)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.index.index',compact('articles'));
    }

//    public function contact($id)
//    {
//        $article = Articles::find($id);
//        return view('frontend.articles.content',compact('article'));
//    }





//    public function articles()
//    {
//        $news = Articles::query()
//            ->where('created_at' ,'<=', Carbon::now())
//            ->limit(4)
//            ->orderBy('created_at', 'desc')
//            ->get();
//        foreach ($news as $new){
//            echo $new->articles_category->name." ".$new->title."<br>";
//        }
//        $articles = Articles::all();
//        $promotion = Promotion::all();
//        return view('frontend.articles.index',compact('articles','promotion','news'));
//    }

}
