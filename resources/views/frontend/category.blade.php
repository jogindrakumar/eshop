@extends('layouts.frontend')

@section('title')

 E-shop
@endsection

@section('content')
@include('layouts.inc.slider')



<div class="py-5">
    <div class="container">
        <div class="row">
            <h5>All Category</h5>


            <div class="col-md-12">
                <div class="row">
                    @foreach ($categories as $category )
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('assets/upload/category/'.$category->image) }}" alt="category image">
                            <div class="card-body">
                                <h5>{{ $category->name }}</h5>
                              <p>{{$category->description }}</p>
                               
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