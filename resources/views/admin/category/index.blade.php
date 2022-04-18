@extends('layouts.master')
@section('title', 'Category')
@section('content')

    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header">
                <h4>View Category
                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @if (session('red_msg'))
                    <div class="alert alert-danger">{{ session('red_msg') }}</div>
                @endif
                <table id="mytable" class="table table-borderd">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $c = 0; ?>
                        @foreach ($category as $cat)
                            <tr>
                                <td>{{ ++$c }}</td>
                                <td>{{ $cat->name }}</td>
                                <td><img src="{{ asset('uploads/category/' . $cat->image) }}" alt="" width="50px"
                                        height="50px"></td>
                                <td>{{ $cat->status == 1 ? 'true' : 'false' }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-category/' . $cat->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/delete-category/' . $cat->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
