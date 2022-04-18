@extends('layouts.master')
@section('title', 'Create Posts')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Add Post
                    <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/add-post') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Post Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" name="description" id="mySummerNote" row="4" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Youtube IFrame Link</label>
                        <input type="text" name="yt_iframe" class="form-control">
                    </div>

                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Meta Description</label>
                        <textarea type="text" name="meta_description"  class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Meta keyword</label>
                        <textarea type="text" name="meta_keyword" class="form-control"></textarea>
                    </div>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end">Save Post</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
