@extends('layouts.front')
@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Home / Cart </h6>
        </div>
    </div>

   @if ($cartItems->count() > 0)
   <div class="container my-5">
    <div class="card shdow">
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartItems as $cartItem)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{ asset('admin/uploads/products/' . $cartItem->products->image) }}" alt=""
                            width="50px" height="50px">
                    </div>
                    <div class="col-md-3">
                        <h6>{{ $cartItem->products->name }}</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>TK : {{ $cartItem->products->selling_price }}</h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" value="{{ $cartItem->product_id }}" class="product_id">
                        @if ($cartItem->products->qty >= $cartItem->product_qty)
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center"
                                    value="{{ $cartItem->product_qty }}">
                                <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>
                            @php $total += $cartItem->products->selling_price * $cartItem->product_qty; @endphp
                            @else
                            <h6>Out of Stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm mt-4 delete-cart-item">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price : {{ $total }} TK=/
                <a href="{{ route('cart.checkout') }}" class="btn btn-outline-success btn-sm float-end">Proceed to
                    Checkout</a>
            </h6>
        </div>
    </div>
</div>
   @else
       <div class="card-body text-center">
        <h2>Your Cart is Empty</h2>
        <a href="{{ route('front.home') }}">Shopping first</a>
       </div>
   @endif
@endsection

@section('scripts')
@endsection
