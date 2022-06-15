@extends('layouts.frontend')

@section('title')

 E-shop
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Products</h2>
            <div class="owl-carousel trending-carousel owl-theme">
                
                @foreach ($trending_product as $product )
                
           
                <div class="item">
                    <a href="{{ route('view-category',$product->slug) }}" class="view-category">
                    <div class="card">
                        <img src="{{ asset($product->image) }}" alt="product image">
                        <div class="card-body">
                            <h5>{{ $product->name }}</h5>
                            <span class="float-start">₹ {{ $product->selling_price }}</span>
                            <span class="float-end"><s>₹ {{ $product->original_price }}</s></span>
                           
                        </div>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
           
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2 class="mb-3">Category Wise</h2>
            <div class="owl-carousel trending-carousel owl-theme">
                
                @foreach ($popular_category as $category )
                
           
                <div class="item">
                    <div class="card">
                        <img src="{{ asset('assets/upload/category/'.$category->image) }}" alt="category image">
                        <div class="card-body">
                            <h5>{{ $category->name }}</h5>
                           <p>{{ $category->description }}</p>
                           
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
           
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    $('.trending-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    // dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection