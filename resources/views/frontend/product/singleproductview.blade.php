@extends('layouts.frontend')

@section('title',$products->name)

 


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">

    <div class="container">
        <h6 class="mb-0">Collection / {{ $products->category->name }}/ {{ $products->name }}</h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{ asset($products->image) }}" alt="" class="w-100">
            </div>
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{ $products->name }}

                    @if ( $products->trending == '1')
                    <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag" for="">
                    Trending
                    </label>

                    @endif
                    
                </h2>
                <hr>
                <label for="" class="me-3">Original Price : <s> Rs {{ $products->original_price }}</s></label>
                <label for="" class="fw-bold">Selling Price :  Rs {{ $products->selling_price }}</label>
                <p class="mt-3">
                    {{ $products->small_description }}
                </p>
                <hr>
                @if ($products->qty > 0)
                <label for="" class="badge bg-success">In Stock</label>
                  @else  
                  <label for="" class="badge bg-danger">Out of Stock</label>
                @endif
                <div class="row mt-2">
                    <div class="col-md-2">
                        <label for="Quantity">Quantity</label>
                        <input type="hidden" value="{{ $products->id }}" class="prod_id">
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity"  class="form-control qty-input text-center" value="1">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                    </div>
                    <div class="col-md-10">
                        <br>
                        <button class="btn btn-primary me-3 float-start addToCartBtn" type="button">Add to Cart <i class="fas fa-cart-plus"></i></button>
                        <button class="btn btn-success me-3 float-start" type="button">Add to Wishlist <i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')
<script>

    $(document).ready(function() {

        $('.addToCartBtn').click(function(e){
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    "product_id" : product_id,
                    "product_qty" : product_qty,
                },
                success: function(response){
                    alert(response.status);

                }
            });
           
        });


        $('.increment-btn').click(function(e){
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10){
                value ++;
                $('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e){
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value --;
                $('.qty-input').val(value);
            }
        });

    });
</script>
@endsection