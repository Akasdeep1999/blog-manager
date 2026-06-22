<?php

namespace Mycompany\BlogManager\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Mycompany\BlogManager\Models\Blog;
use Mycompany\BlogManager\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('category')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'nullable|exists:blog_categories,id',
            'image' => 'nullable|image',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        $image = null;
        $ogImage = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $image = $filename;
        }
        
        if ($request->hasFile('ogImage')) {
            $file = $request->file('ogImage');
            $filename = time() . 'og.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs'), $filename);
            $ogImage = $filename;
        }

        Blog::create([
            'title' => $request->title,
            'page_slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $image,
            'status' => $request->status,

            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,

            'og_title' => $request->og_title,
            'og_image' => $ogImage,
            'og_description' => $request->og_description,
        ]);

        return redirect('admin/blog/posts')->with('message', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
