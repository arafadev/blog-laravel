@extends('layouts.app')
@section('title', "$category->meta_title" )
@section('meta_keyword', "$category->keyword" )
@section('meta_description', "$category->meta_description" )
@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h4>{{ $category->name }}</h4>
                    </div>

                    @forelse ($posts as $post)
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <a href="{{ url('tutorial/' . $category->slug . '/' . $post->slug) }}"
                                    class="text-decoration-none">
                                    <h2 class="post-heading">{{ $post->name }} </h2>
                                </a>
                                <h6>Posted On: {{ $post->created_at->format('d-m-Y') }}
                                    <span class="ms-3">Posted By: {{ $post->user->name }}</span>
                                </h6>
                            </div>
                        </div>
                    @empty
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <h1>No Post Avilable</h1>
                            </div>
                        </div>
                    @endforelse
                        {{ $category->keyword }}


                </div>
                <div class="col-md-3">
                    <div class="border p-2"></div>
                    <h4>Advertising Area</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
