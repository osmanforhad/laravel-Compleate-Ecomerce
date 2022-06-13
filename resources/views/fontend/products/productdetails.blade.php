@extends('layouts.front')
@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collenctions / {{ $product->category->name }} / {{ $product->name }}</h6>
        </div>
    </div>

    <div class="container">
        <div class="card-shadow product_data">
            <div class="card-body">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('admin/uploads/products/' . $product->image) }}" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $product->name }}
                        @if ($product->trending == '1')
                            <label style="font-size:16px" class="float-end badge bg-danger trending-tag">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original Price: <s>Tk {{ $product->original_price }}</s></label>
                    <label class="me-3">Original Price: Tk {{ $product->selling_price }}</label>
                    <p class="mt-3">
                        {!! $product->small_description !!}
                    </p>
                    <hr>
                    @if ($product->qty > 0)
                        <label class="badge bg-success">In Stock</label>
                    @else
                        <label class="badge bg-success">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $product->id }}" class="product_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            @if ($product->qty > 0)
                                <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to Cart</button>
                            @endif
                            <button type="button" class="btn btn-success me-3 float-start addToWishlist">Add to
                                Wishlist</button>
                        </div>
                        <div class="col-md-12">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script></script>
@endsection
