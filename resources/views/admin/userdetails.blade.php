@extends('layouts.admin')
@section('title', 'User Details')

@section('content')
    <div class="crd">
        <div class="card-header">
            <h4>Users List
                <b class="float-right"><a href="{{ route('registered.users') }}" class="btn btn-primary btn-sm">Back</a></b>
            </h4>
            <hr>
        </div>
        <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Registerd Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $custom_id = 1;
                            @endphp
                                <tr>
                                    <td>{{ $custom_id++ }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->role_as == 0 ? 'Customer' : 'Admin' }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->phone }}</td>
                                    <td>{{ $users->fname }} </td>
                                    <td>{{ $users->lname }} </td>
                                    <td>{{ $users->firstAddress }} </td>
                                    <td>{{ $users->city }} </td>
                                </tr>
                        </tbody>
                    </table>
        </div>
    </div>
@endsection
