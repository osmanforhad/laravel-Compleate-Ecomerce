@extends('layouts.front')
@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (count($categories) == 0)
                        <b>There is no Category in the Record</b>
                    @else
                    <h2>All Category</h2>
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-md-3 mb-3">
                             <a href="{{ route('view.category', $category->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('admin/uploads/category/' . $category->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $category->name }}</h5>
                                        <p>
                                            {{ $category->description }}
                                        </p>
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
    </div>
@endsection

@section('scripts')
@endsection
