<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the published blog posts.
     */
    public function index()
    {
        return view('frontend.blogs', [
            'blogs' => Blog::query()->where('is_published', true)->orderByDesc('published_at')->get(),
        ]);
    }

    /**
     * Display the specified blog post.
     */
    public function show(Blog $blog)
    {
        return view('frontend.blog', [
            'blog' => $blog,
        ]);
    }
}
