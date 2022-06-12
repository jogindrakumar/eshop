<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function add(){

        return view('admin.category.add');
    }
    public function store(Request $request){
        $category = new Category();
        if($request->hasFile('image')){

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/upload/category',$filename);
            $category->image = $filename;

        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title= $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->save();
        return redirect('/dashboard')->with('status','category Added Successfully');
    }
    public function edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    public function update(Request $request , $id){
        $category = Category::find($id);
        if($request->hasFile('image')){
            $path = 'assets/upload/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/upload/category',$filename);
            $category->image = $filename;

        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title= $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->update();
        return redirect('categories')->with('status','category updated successfully');
    }

    public function delete($id){
        $category = Category::findOrFail($id);
      if($category->image){
        $path = 'assets/upload/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
      }
      $category->delete();
      return redirect('categories')->with('status','Category Deleted successfully!');
    }
}
