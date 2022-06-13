@extends('layouts.front')
@section('title')
    {{ $category->name }}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{ $category->name }}</h6>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center p-2">{{ $category->name }}</h2>
                <hr>
                @if (count($products) == 0)
                    <p>There is no Record in the database</p>
                @else
                    <div>
                        @foreach ($products as $product)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('view.category',$category->slug.'/'.$product->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('admin/uploads/products/' . $product->image) }}" alt="">
                                        <div class="card-body">
                                            <h5>{{ $product->name }}</h5>
                                            <s class="float-start" style="color:red">{{ $product->original_price }}</s>
                                            <small class="float-end">{{ $product->selling_price }}</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
