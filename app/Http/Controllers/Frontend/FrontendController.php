<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function viewCategoryPost($category_slug)
    {
        /**
         *catch the category id
         */
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $posts = Post::where('category_id', $category->id)->get();
            return view('frontend.post.index', compact('posts', 'category'));
        } else {
            return redirect('/');
        }
        // return view('frontend.' . $category_slug);
    }
    public function viewPost(string $category_slug, string $post_slug)
    {

        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status', '0')->first();
            if ($post) {
                return view('frontend.post.view', compact('post'));
            }else{
            return redirect('/');
                
            }
        } else {
            return redirect('/');
        }
    }
}
