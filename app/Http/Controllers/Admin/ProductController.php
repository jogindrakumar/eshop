<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        $category = Category::all();
        return view('admin.product.index',compact('products','category'));
    }
    public function add(){
        $category = Category::all();
        return view('admin.product.add',compact('category'));
    }
    public function store(Request $request){
        $img = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $upload_location = 'assets/upload/product/';
        $last_image = $upload_location.$img_name;
        $img->move($upload_location,$img_name);



        Product::insert([
                'name' =>$request->name,
                'cat_id' =>$request->cat_id,
                'slug' =>$request->slug,
                'small_description' =>$request->small_description,
                'description' =>$request->description,
                'original_price' =>$request->original_price,
                'selling_price' =>$request->selling_price,
                'tax' =>$request->tax,
                'qty' =>$request->qty,
                'status' =>$request->status == TRUE ? '1':'0',
                'trending' =>$request->status == TRUE ? '1':'0',
                'meta_title' =>$request->meta_title,
                'meta_keywords' =>$request->meta_keywords,
                'meta_description' =>$request->meta_description,
                'image' =>$last_image,
        ]);
        return redirect()->route('product')->with('status','product Add successfully');

    }
    

    // edit 

    public function edit($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit',compact('product','category'));
    }

    // product update 
    public function update(Request $request , $id){

        $img = $request->file('img');
        $old_img = $request->old_img;
        $img = $request->file('image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $upload_location = 'assets/upload/product/';
        $last_image = $upload_location.$img_name;
        $img->move($upload_location,$img_name);
        unlink($old_img);
        Product::findOrFail($id)->update([
            'name' =>$request->name,
            'cat_id' =>$request->cat_id,
            'slug' =>$request->slug,
            'small_description' =>$request->small_description,
            'description' =>$request->description,
            'original_price' =>$request->original_price,
            'selling_price' =>$request->selling_price,
            'tax' =>$request->tax,
            'qty' =>$request->qty,
            'status' =>$request->status == TRUE ? '1':'0',
            'trending' =>$request->status == TRUE ? '1':'0',
            'meta_title' =>$request->meta_title,
            'meta_keywords' =>$request->meta_keywords,
            'meta_description' =>$request->meta_description,
            'image' =>$last_image,
    ]);
    return redirect()->route('product')->with('status','product updated successfully');

        
    }


    // delete function product

    public function delete($id){
        $image = Product::findorFail($id);
        $old_image = $image->image;
        unlink($old_image);
        Product::find($id)->delete();
        return redirect()->route('product')->with('status','product Delete successfully');
    }
}
