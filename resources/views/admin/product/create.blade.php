@extends('layouts.admin')
@section('title', 'Add Category')

@section('content')
<div class="crd">
    <div class="card-header">
        <h1 class="text-center">Create new Product</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                 <textarea name="small_description" rows="4" cols="100" class="from-control"></textarea>
                </div>
               <div class="col-md-12 mb-3">
                   <label for="">Description</label>
                <textarea name="description" rows="4" cols="100" class="from-control"></textarea>
               </div>
               <div class="col-md-6 mb-3">
                <label for="">Original Price</label>
                <input type="number" name="original_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Selling Price</label>
                <input type="number" name="selling_price" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Tax</label>
                <input type="number" name="tax" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Quantity</label>
                <input type="number" name="qty" class="form-control">
            </div>
               <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" name="status" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Trending</label>
                <input type="checkbox" name="trending" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta Description</label>
                <input type="text" name="meta_description" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta Keyword</label>
                <input type="text" name="meta_keywords" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Product Category</label>
                @if (count($categories) == 0)
                <h4>
                    <b>No Category Available</b>
                </h4>
                @else
                <select name="cat_id" class="form-select">
                    <option value="">Select a Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @endif
            </div>
            <div class="col-md-12 mb-3">
                <label for="">Image</label>
             <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </form>
    </div>
</div>
@endsection
