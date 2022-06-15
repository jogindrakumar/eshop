@extends('layouts.frontend')

@section('title',$products->name)

 


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">

    <div class="container">
        <h6 class="mb-0">Collection / Category Name / Product Name</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow">
        <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{ asset($products->image) }}" alt="" class="w-100">
            </div>
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{ $products->name }}
                    <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag" for="">Trending</label>
                </h2>
                <hr>
                <label for="" class="me-3">Original Price : <s> Rs {{ $products->original_price }}</s></label>
                <label for="" class="fw-bold">Selling Price : <s> Rs {{ $products->original_price }}</s></label>
                <p class="mt-3">
                    {{ $products->small_description }}
                </p>
            </div>
        </div>
    </div>
</div>


@endsection