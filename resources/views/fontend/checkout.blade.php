@extends('layouts.front')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-3">
        <form action="{{ route('order.place') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="fname" value="{{ Auth::user()->fname }}" class="form-control" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" placeholder="Enter Phone number">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone">Email</label>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstAddress">Address 1</label>
                                    <input type="text" name="firstAddress"  value="{{ Auth::user()->firstAddress }}" class="form-control"
                                        placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="secondAddress">Address 2</label>
                                    <input type="text" name="secondAddress" value="{{ Auth::user()->secondAddress }}" class="form-control"
                                        placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control" placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pincode">Pin Code</label>
                                    <input type="text" name="pincode" value="{{ Auth::user()->pincode }}" class="form-control" placeholder="Enter Pin Code">
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
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $cartItem)
                                        <tr>
                                            <td> {{ $cartItem->products->name }}</td>
                                            <td> {{ $cartItem->product_qty }}</td>
                                            <td> {{ $cartItem->products->selling_price }}</td>
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-sm float-end">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
