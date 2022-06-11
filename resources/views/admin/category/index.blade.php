@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <h4>category page</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">category name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    
              
              <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td><img src="{{ asset('assets/upload/category/'.$category->image) }}" alt="" style="height: 100px; width:100px;"></td>
                <td>
                    <a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
    </div>
</div>
@endsection