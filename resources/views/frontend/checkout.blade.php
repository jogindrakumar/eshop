@extends('layouts.frontend')

@section('title')

Checkout
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{ url('place-order') }}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your Email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="number" class="form-control" name="phone" placeholder="Enter your Number">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 1</label>
                            <input type="text" class="form-control" name="address1" placeholder="Enter Address 1">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" class="form-control" name="address2" placeholder="Enter Address 2">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="city" placeholder="Enter city">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" class="form-control" name="state" placeholder="Enter State">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name="country" placeholder="Enter country">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pin Code</label>
                            <input type="number" class="form-control" name="pincode" placeholder="Enter PIN CODE">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item )
                            <tr>
                                <td> {{ $item->products->name }}</td>
                                <td> {{ $item->prod_qty }}</td>
                                <td> {{ $item->products->selling_price }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
               <hr>
               <button type="submit" class="btn btn-primary float-end">Place Order</button>
                   
              
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection