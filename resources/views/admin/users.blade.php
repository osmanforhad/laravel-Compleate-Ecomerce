@extends('layouts.admin')
@section('title', 'Registered Users')

@section('content')
    <div class="crd">
        <div class="card-header">
            <h4>Users List</h4>
            <hr>
        </div>
        <div class="card-body">
            @if (count($users) == 0)
                <h4 class="text-center">
                    <b>no record found</b>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Registerd Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Full Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $custom_id = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $custom_id++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->fname.' '.$user->lname }}  </td>
                                    <td>
                                        <a href="{{ route('user.details', $user->id) }}"
                                            class="btn btn-primary btn-sm">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif
        </div>
    </div>
@endsection
