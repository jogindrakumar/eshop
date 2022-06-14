@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-heading">
        <h4>All Product</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">product name</th>
                <th scope="col">Category</th>
                <th scope="col">Selling Price</th>
                <th scope="col">Original Price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    
              
              <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->original_price }}</td>
                <td><img src="{{ asset($product->image) }}" alt="" style="height: 70px; width:70px;"></td>
                <td>
                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('product.delete',$product->id) }}" 
                      onclick="return confirm('Are you sure you want to delete this item?');"
                      class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
    </div>
</div>
@endsection