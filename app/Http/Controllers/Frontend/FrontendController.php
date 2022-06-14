<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //

    public function index(){
        $trending_product = Product::where('trending','1')->take(15)->get();
        return view('frontend.index',compact('trending_product'));
    }
}
