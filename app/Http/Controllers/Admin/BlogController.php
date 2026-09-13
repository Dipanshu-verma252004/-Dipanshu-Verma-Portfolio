<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', ['blogs' => Blog::with('blogCategory')->orderByDesc('published_at')->orderByDesc('id')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.blog.form', ['blog' => new Blog(), 'categories' => BlogCategory::where('is_active', true)->orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        Blog::create($this->validated($request));
        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.form', ['blog' => $blog, 'categories' => BlogCategory::where('is_active', true)->orderBy('name')->get()]);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->update($this->validated($request, $blog));
        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog post deleted successfully.');
    }

    private function validated(Request $request, ?Blog $blog = null): array
    {
        $data = $request->validate([
            'blog_category_id' => ['nullable','exists:blog_categories,id'],
            'title' => ['required','string','max:200'],
            'excerpt' => ['nullable','string','max:1000'],
            'content' => ['required','string'],
            'featured_image' => ['nullable','string','max:500'],
            'author' => ['nullable','string','max:150'],
            'published_at' => ['nullable','date'],
            'is_published' => ['nullable','boolean'],
            'meta_title' => ['nullable','string','max:200'],
            'meta_description' => ['nullable','string','max:500'],
            'meta_keywords' => ['nullable','string','max:500'],
        ]);
        $slug = Str::slug($data['title']);
        $query = Blog::where('slug', $slug);
        if ($blog) $query->whereKeyNot($blog->id);
        if ($query->exists()) $slug .= '-' . Str::lower(Str::random(5));
        $data['slug'] = $slug;
        $data['is_published'] = $request->boolean('is_published');
        return $data;
    }
}
