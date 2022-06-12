<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function add(){
        return view('admin.product.add');
    }
    public function store(Request $request){

    }
}
