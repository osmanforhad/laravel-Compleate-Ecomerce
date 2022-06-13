@extends('layouts.admin')
@section('title', 'Product List')

@section('content')
    <div class="crd">
        <div class="card-header">
            <h4>Product List</h4>
            <hr>
        </div>
        <div class="card-body">
            @if (count($products) == 0)
                <h4 class="text-center">
                    <b>no record found</b>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Original Price</th>
                                <th>Selling Price</th>
                                <th>Trending</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $custom_id = 1;
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $custom_id++ }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->original_price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>
                                        @if ($product->trending == 1)
                                            <b>Trending Now</b>
                                        @else
                                            <b>Not Trending</b>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('admin/uploads/products/' . $product->image) }}"
                                            alt="{{ $product->name }}" class="w-25">
                                    </td>
                                    <td>
                                        @if ($product->status == 1)
                                            <b>Active</b>
                                        @else
                                            <b>UnActive</b>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif
        </div>
    </div>
@endsection
