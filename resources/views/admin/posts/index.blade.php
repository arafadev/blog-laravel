@extends('layouts.master')
@section('title', 'Posts')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-header">
                <h4>View Posts
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary btn-sm float-end">Add post</a>
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
                            <th>Post Name</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $c = 0; ?>
                        @foreach ($post as $p)
                            <tr>
                                <td>{{ ++$c }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->category->name }}</td>
                                <td>{{ $p->status == 1 ? 'Hidden' : 'Visibale' }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-post/' . $p->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/delete-post/' . $p->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
