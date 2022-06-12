<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function add(){
        $category = Category::all();
        return view('admin.product.add',compact('category'));
    }
    public function store(Request $request){

    }
}
