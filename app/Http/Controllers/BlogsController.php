<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        return view('frontend.blogs.index');
    }

    public function show(Blog $blog)
    {
        $blog->load(['user', 'category', 'category.posts', 'tags']);
        $recent_blogs = Blog::orderBy('created_at', 'DESC')->where('id', '!=', $blog->id)->take(3)->get();
        $categories = Category::orderBy('created_at', 'DESC')->withCount('posts')->limit(10)->get();
        return view('frontend.blogs.show', ['blog' => $blog, 'recent_blogs' => $recent_blogs, 'categories' => $categories]);
    }
}
