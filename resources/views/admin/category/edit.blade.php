@extends('layouts.admin')
@section('title', 'Category')

@section('content')
<div class="crd">
    <div class="card-header">
        <h1 class="text-center">Update Category</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                </div>
               <div class="col-md-12 mb-3">
                   <label for="">Description</label>
                <textarea name="description" rows="4" cols="100" class="from-control">{{ $category->description }}</textarea>
               </div>
               <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" name="status" {{ $category->status == "1" ? 'checked':'' }} class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" name="popular" {{ $category->popular == "1" ? 'checked':'' }} class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta Description</label>
                <input type="text" name="meta_description" value="{{ $category->meta_description }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Meta Keyword</label>
                <input type="text" name="meta_keywords" value="{{ $category->meta_keywords }}" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                @if ($category->image)
                <img src="{{ asset('admin/uploads/category/'.$category->image) }}" width="50px" alt="{{ $category->name }}">
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
