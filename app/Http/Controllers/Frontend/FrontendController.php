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

        $categories = Category::where('status','1')->get();
        return view('frontend.category',compact('categories'));
    }

    // sperate category show in page 

    public function viewCategory($slug){
        if(Category::where('slug',$slug)->exists()){

            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cat_id',$category->id)->where('status','1')->get();
            return view('frontend.product.index',compact('category','products'));

        }else
        {
            return redirect('/')->with('status','link broken');
        }
        

    }

    //create single product details function 
    public function productView($cat_slug,$prod_slug){

        if(Category::where('slug',$cat_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){

                $products = Product::where('slug',$prod_slug)->first();
                return view('frontend.product.singleproductview',compact('products'));

            }
            else{
                return redirect('/')->with('status','the Link was broken');
            }
        } else{
            return redirect('/')->with('status','No such category found');
        }

    }
}
