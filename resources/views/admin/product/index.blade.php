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
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    
              
              <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset($product->image) }}" alt="" style="height: 100px; width:100px;"></td>
                <td>
                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
    </div>
</div>
@endsection