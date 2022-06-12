@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <h4>Add category page</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-6">
                <label for="">Slug</label>
                <input type="text" class="form-control" name="slug">
            </div>
            <div class="col-md-12">
                <label for="">Description</label>
                <textarea name="description"  rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
                <label for="">Status</label>
                <input type="checkbox"  name="status">
            </div>
            <div class="col-md-6">
                <label for="">Popular</label>
                <input type="checkbox" name="popular">
            </div>
            <div class="col-md-12">
                <label for="">Meta title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>
            <div class="col-md-6">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control" rows="3"></textarea>
               
            </div>
            <div class="col-md-6">
                <label for="">Meta Description</label>
                <textarea name="meta_descrip" class="form-control" rows="3"></textarea>
             
            </div>
            <div class="col-md-6">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection