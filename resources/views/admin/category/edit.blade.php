@extends('layouts.master')
@section('title', 'Edit Category')
@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit Category</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())    
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="cn">Category Name</label>
                        <input id="cn" type="text" class="form-control" name="name" value="{{ $category->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="sl">Slug</label>
                        <input id="sl" type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="ds">Description</label>
                        <textarea id="ds" class="form-control" name="description" row="5" >{{ $category->name }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img">Image</label>
                        <input id="img" type="file" class="form-control" name="image">
                    </div>

                    <h6>SEO Tags</h6>
                    <div class="mb-3">
                        <label for="mt">Meta Title</label>
                        <input id="mt" type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="md">Meta Description</label>
                        <textarea id="md" row="3" class="form-control" name="meta_description">{{ $category->meta_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="mk">Meta Keywords</label>
                        <textarea id="mk" row="3" class="form-control" name="meta_keyword">{{ $category->meta_keyword }}</textarea>
                    </div>
                    
                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="nav">Navbar Status</label>
                            <input type="checkbox" name="navbar_status" id="nav" {{ $category->navbar_status == '1' ? 'checked': '' }}>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="sts">Status</label>
                            <input type="checkbox" name="status" id="sts" {{ $category->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>                        
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
