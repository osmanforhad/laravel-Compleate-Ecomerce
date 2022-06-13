@extends('layouts.front')
@section('title')
    My Wish List
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Home / Wishlist </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shdow">
            <div class="card-body">
                @if ($wishlists->count() > 0)
                <div class="card-body">
                    @foreach ($wishlists as $wishlistItem)
                        <div class="row product_data">
                            <div class="col-md-2">
                                <img src="{{ asset('admin/uploads/products/' . $wishlistItem->products->image) }}" alt=""
                                    width="50px" height="50px">
                            </div>
                            <div class="col-md-2">
                                <h6>{{ $wishlistItem->products->name }}</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>TK : {{ $wishlistItem->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $wishlistItem->product_id }}" class="product_id">
                                @if ($wishlistItem->products->qty >= $wishlistItem->product_qty)
                                <h6>In Stock</h6>
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                                    @else
                                    <h6>Out of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success btn-sm mt-4 addToCartBtn">Add to Cart</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger btn-sm mt-4 remove-wishlist-item">Remove</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                <h4 class="text-center">There are no products in your wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
