@extends('layouts.frontend')

@section('title')

{{ $category->name }}
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h5>{{ $category->name }}</h5>


            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $product )
                    <div class="col-md-3 mb-3">
                       
                        <div class="card">
                            <img src="{{ asset($product->image) }}" alt="product image">
                            <div class="card-body">
                                <h5>{{ $product->name }}</h5>
                                <span class="float-start">₹ {{ $product->selling_price }}</span>
                            <span class="float-end"><s>₹ {{ $product->original_price }}</s></span>
                             
                               
                            </div>
                        </div>
                    
                    </div>
              

                
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection