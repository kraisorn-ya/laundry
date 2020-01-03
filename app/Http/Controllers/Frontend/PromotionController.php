<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function intro()
    {
        $promotion = Promotion::find(2);

//        echo $promotion;
        return view('frontend.index.index',compact('promotion'));
    }
}
