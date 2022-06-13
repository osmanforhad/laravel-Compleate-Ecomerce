@extends('layouts.front')
@section('title')
    Order Details
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Order Details
                            <a href="{{ route('orders.list') }}" class="btn btn-warning btn-sm float-end">Back</a>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{ $orders->firstAddress }},
                                    {{ $orders->secondAddress }},
                                    {{ $orders->city }},
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderItems as $order)
                                            <tr>
                                                <td>{{ $order->products->name }}</td>
                                                <td>{{ $order->product_qty }}</td>
                                                <td>{{ $order->price }}</td>
                                                <td>
                                                    <img src="{{ asset('admin/uploads/products/' . $order->products->image) }}"
                                                        width="50px" alt="{{ $order->products->name }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Grand Total =
                                    <b class="float-end">{{ $orders->total_price }}</b>
                                </h4>
                                <p class="px-2">
                                    <label for="">Order Status</label>
                                <form action="{{ route('admin.updateOrder', $orders->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select" name="order_status">
                                        <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                                        <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Compleated
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2 float-end">Update</button>
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
