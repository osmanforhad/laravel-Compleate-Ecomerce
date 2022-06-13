@extends('layouts.front')
@section('title')
    E-Shop Home Page
@endsection

@section('content')
    @include('layouts.inc.frontslider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2 class="text-center p-2">Popular Categories</h2>
                <hr>
                @if (count($popular_categories) == 0)
                    <p>There is no record in the Database</p>
                @else
                    <div class="owl-carousel trendingProduct-carousel owl-theme">
                        @foreach ($popular_categories as $popular_category)
                            <div class="item">
                                <a href="{{ route('view.category', $popular_category->slug ) }}">
                                    <div class="card">
                                        <img src="{{ asset('admin/uploads/category/' . $popular_category->image) }}"
                                            alt="">
                                        <div class="card-body">
                                            <h5>{{ $popular_category->name }}</h5>
                                            <p>{{ $popular_category->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="row">
                <h2 class="text-center p-2">Trending Products</h2>
                <hr>
                @if (count($trending_products) == 0)
                    <p>There is no Record in the database</p>
                @else
                    <div class="owl-carousel trendingProduct-carousel owl-theme">
                        @foreach ($trending_products as $trending_product)
                            <div class="item">
                                <div class="card">
                                    <img src="{{ asset('admin/uploads/products/' . $trending_product->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $trending_product->name }}</h5>
                                        <s class="float-start"
                                            style="color:red">{{ $trending_product->original_price }}</s>
                                        <small class="float-end">{{ $trending_product->selling_price }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.trendingProduct-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection
