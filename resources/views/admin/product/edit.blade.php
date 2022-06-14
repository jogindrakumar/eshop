@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-heading">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
     
      
            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')
                <div class="col-md-6  mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" name="name">
                </div>
                <div class="col-md-6  mb-3">
                    <label for="">slug</label>
                    <input type="text" class="form-control" value="{{ $product->slug }}"  name="slug">
                </div>
                   <div class="col-md-12 mb-3">
                    <select class="form-select" name="cat_id" aria-label="Default select example">
    
                        <option value="" >Select Category</option>
                        @foreach ($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        
             
            </select>
                   </div>
                   <div class="col-md-12">
                    <label for="">small Description</label>
                    <textarea name="small_description"  rows="3" class="form-control">{{ $product->small_description }} </textarea>
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea name="description"  rows="3" class="form-control">{{ $product->description }} </textarea>
                </div>
                <div class="col-md-12">
                    <label for="">original price</label>
                    <input type="number" name="original_price" value="{{ $product->original_price }}" class="form-control">
                </div>
              
                <div class="col-md-12">
                    <label for="">selling price</label>
                    <input type="number" name="selling_price" value="{{ $product->selling_price }}" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="old_img" value="{{$product->image}}"  > 
                </div>
                <div class="col-md-6">
                    <img src="{{ asset($product->image) }}" alt="" style="width: 100px; height:100px;">
                </div>
                <div class="col-md-6">
                    <label for="">Image</label>
                    <input type="file" class="form-control" value="{{ $product->image }}" name="image">
                </div>
                <div class="col-md-12">
                    <label for="">quantity</label>
                    <input type="number" value="1" name="qty" value="{{ $product->qty}}" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="">tax</label>
                    <input type="number" name="tax" value="{{ $product->tax }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $product->status == '1' ? 'checked': '' }}  name="status" >
                </div>
                <div class="col-md-6">
                    <label for="">trending</label>
                    <input type="checkbox" {{ $product->trending == '1' ? 'checked': '' }}  name="trending" >
                </div>
                <div class="col-md-12">
                    <label for="">Meta title</label>
                    <input type="text" class="form-control" value="{{ $product->meta_title }}" name="meta_title">
                </div>
                <div class="col-md-6">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" class="form-control" rows="3">{{ $product->meta_keywords }}</textarea>
                   
                </div>
                <div class="col-md-6">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ $product->meta_description }}</textarea>
                 
                </div>
               
                <div class="col-md-12">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
      
    </div>
</div>
@endsection