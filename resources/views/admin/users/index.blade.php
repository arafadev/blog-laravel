@extends('layouts.master')
@section('title', 'Users')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-header">
                <h4>View Users
                    {{-- <a href="{{ url('admin/add-user') }}" class="btn btn-primary btn-sm float-end">Add User</a> --}}
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table id="mytable" class="table table-borderd">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $c = 0; ?>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$c }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role_as == '1')
                                        {{ 'Admin' }}
                                    @elseif ($user->role_as == '0')
                                        {{ 'User' }}
                                    @else
                                        {{ 'Blogger' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/user/' . $user->id) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
