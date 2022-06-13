@extends('layouts.admin')
@section('title', 'Add Category')

@section('content')
<div class="crd">
    <div class="card-header">
        <h1 class="text-center">Create new Category</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
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
                   <label for="">Description</label>
                <textarea name="description" rows="4" cols="100" class="from-control"></textarea>
               </div>
               <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <input type="checkbox" name="status" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Popular</label>
                <input type="checkbox" name="popular" class="form-control">
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
