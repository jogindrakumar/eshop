@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <h4>Edit category page</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('update.category',$categories->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="">Name</label>
                <input type="text" class="form-control" value="{{ $categories->name }}" name="name">
            </div>
            <div class="col-md-6">
                <label for="">Slug</label>
                <input type="text" class="form-control" value="{{ $categories->slug }}" name="slug">
            </div>
            <div class="col-md-12">
                <label for="">Description</label>
                <textarea name="description"  rows="3" value="{{ $categories->description }}" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
                <label for="">Status</label>
                <input type="checkbox" {{ $categories->status == '1' ? 'checked': '' }}  name="status" >
            </div>
            <div class="col-md-6">
                <label for="">Popular</label>
                <input type="checkbox" {{ $categories->popular == '1' ? 'checked': '' }} name="popular" >
            </div>
            <div class="col-md-12">
                <label for="">Meta title</label>
                <input type="text" class="form-control" name="meta_title" value="{{ $categories->meta_title }}">
            </div>
            <div class="col-md-6">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" class="form-control" value="" rows="3">{{ $categories->name }}</textarea>
               
            </div>
            <div class="col-md-6">
                <label for="">Meta Description</label>
                <textarea name="meta_descrip" class="form-control" rows="3" value="">{{ $categories->meta_descrip }}</textarea>
             
            </div>
            <div class="col-md-6">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" value="{{ $categories->image }}">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection