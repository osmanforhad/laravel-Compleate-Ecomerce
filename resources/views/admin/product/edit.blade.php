@extends('layouts.admin')
@section('title', 'Add Category')

@section('content')
    <div class="crd">
        <div class="card-header">
            <h1 class="text-center">Update Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="4" cols="100" class="from-control">{{ $product->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="4" cols="100" class="from-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" name="original_price" value="{{ $product->original_price }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" name="selling_price" value="{{ $product->selling_price }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" name="tax" value="{{ $product->tax }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" name="qty" value="{{ $product->qty }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked' : '' }}
                            class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked' : '' }}
                            class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Description</label>
                        <input type="text" name="meta_description" value="{{ $product->meta_description }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Keyword</label>
                        <input type="text" name="meta_keywords" value="{{ $product->meta_keywords }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Product Category</label>
                        <select name="cat_id" class="form-select">
                            <option>Select Option</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $cat->id == $product->cat_id ? 'selected="selected"' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        @if ($product->image)
                            <img src="{{ asset('admin/uploads/products/' . $product->image) }}" width="50px"
                                alt="{{ $product->name }}">
                        @endif
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
