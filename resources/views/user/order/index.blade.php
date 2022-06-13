@extends('layouts.front')
@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Traking Number</th>
                                    <th>Total Price</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->tracking_no }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->status == '0' ? 'pending' : 'compleated' }}</td>
                                        <td>
                                            <a href="{{ route('order.details',$order->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
