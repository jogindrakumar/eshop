<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
    //

    public function index(){
        $trending_product = Product::where('trending','1')->take(15)->get();
        $popular_category = Category::where('popular','1')->get();
        return view('frontend.index',compact('trending_product','popular_category'));
    }

    // frontend category page

    public function category(){

        $categories = Category::where('status','0')->get();
        return view('frontend.category',compact('categories'));
    }
}
