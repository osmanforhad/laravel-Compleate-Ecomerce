@extends('layouts.admin')
@section('title', 'Category List')

@section('content')
<div class="crd">
    <div class="card-header">
        <h4>Category List</h4>
        <hr>
    </div>
    <div class="card-body">
       @if (count($categories) == 0)
           <h4 class="text-center">
               <b>No Record Found</b>
           </h4>
       @else
       <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $custom_id = 1;
            @endphp
            @foreach ($categories as $category )
            <tr>
                <td>{{ $custom_id++ }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <img src="{{ asset('admin/uploads/category/'.$category->image) }}" alt="{{ $category->name }}" class="w-25">
                </td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('category.delete', $category->id) }}" method="POST">
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
