<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('admin.posts.index', compact('post'));
    }
    public function create()
    {
        $category = Category::where('status', '0')->get();
        return view('admin.posts.create', compact('category'));
    }
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $post = new Post;
        $post->category_id =  $data['category_id'];
        $post->name =  $data['name'];
        $post->slug =  $data['slug'];
        $post->description =  $data['description'];
        $post->yt_iframe =  $data['yt_iframe'];
        $post->meta_title =  $data['meta_title'];
        $post->meta_description =  $data['meta_description'];
        $post->meta_keyword =  $data['meta_keyword'];
        $post->status =  $request->status == true ? '1' : '0';
        $post->created_by =  Auth::user()->id;
        $post->save();
        return redirect('admin/posts')->with('message', 'Post Added Successfully');
    }
    public function edit($post_id)
    {
        $post = Post::find($post_id);
        $categories = Category::where('status', '0')->get();
        if (!$post) {
            return redirect('admin.post');
        }
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    public function update(PostFormRequest $request, $post_id)
    {
        $post = Post::find($post_id);
        if (!$post) {
            return redirect('admin.post');
        }


        $data = $request->validated();
        $post->category_id =  $data['category_id'];
        $post->name =  $data['name'];
        $post->slug =  $data['slug'];
        $post->description =  $data['description'];
        $post->yt_iframe =  $data['yt_iframe'];
        $post->meta_title =  $data['meta_title'];
        $post->meta_description =  $data['meta_description'];
        $post->meta_keyword =  $data['meta_keyword'];
        $post->status =  $request->status == true ? '1' : '0';
        $post->created_by =  Auth::user()->id;
        $post->update();
        return redirect('admin/posts')->with('message', 'Post Updated Successfully');
    }
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        if ($post) {
            $post->delete();
            return redirect('admin/posts')->with('message', 'Post Deleted Successfully');
        }else{
            return redirect('admin/posts');
        }
    }
}
