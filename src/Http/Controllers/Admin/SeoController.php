<?php

namespace Digitechbranz\BlogManager\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Digitechbranz\BlogManager\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seos = Seo::latest()->get();
        return view('admin.seo.index', compact('seos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_title' => 'required|max:255',
            'page_slug' => 'required|unique:seos,page_slug',
            'meta_title' => 'nullable|max:255',
            'ogimage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except(['ogimage', 'twitter_image']);

        // OG Image Upload
        if ($request->hasFile('ogimage')) {

            $file = $request->file('ogimage');
            $filename = time() . '_og.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/seo'), $filename);

            $data['ogimage'] = $filename;
        }

        // Twitter Image Upload
        if ($request->hasFile('twitter_image')) {

            $file = $request->file('twitter_image');
            $filename = time() . '_twitter.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/seo'), $filename);

            $data['twitter_image'] = $filename;
        }

        // Generate slug
        $data['page_slug'] = Str::slug($request->page_slug);

        Seo::create($data);

        return redirect('admin/seo')->with('message', 'SEO created successfully.');
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
        $seo = Seo::findOrFail($id);
        return view('admin.seo.edit', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seo = Seo::findOrFail($id);

        $request->validate([
            'page_title' => 'required|max:255',
            'page_slug' => 'required|unique:seos,page_slug,' . $seo->id,
            'meta_title' => 'nullable|max:255',
            'ogimage' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'twitter_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except(['ogimage', 'twitter_image']);

        // OG Image Upload
        if ($request->hasFile('ogimage')) {

            // Delete old image
            if ($seo->ogimage && File::exists(public_path('uploads/seo/' . $seo->ogimage))) {
                File::delete(public_path('uploads/seo/' . $seo->ogimage));
            }

            $file = $request->file('ogimage');
            $filename = time() . '_og.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/seo'), $filename);

            $data['ogimage'] = $filename;
        }

        // Twitter Image Upload
        if ($request->hasFile('twitter_image')) {

            // Delete old image
            if ($seo->twitter_image && File::exists(public_path('uploads/seo/' . $seo->twitter_image))) {
                File::delete(public_path('uploads/seo/' . $seo->twitter_image));
            }

            $file = $request->file('twitter_image');
            $filename = time() . '_twitter.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/seo'), $filename);

            $data['twitter_image'] = $filename;
        }

        // Generate slug
        $data['page_slug'] = Str::slug($request->page_slug);

        $seo->update($data);

        return redirect('admin/seo')->with('message', 'SEO updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seo = Seo::findOrFail($id);

        // Delete OG image
        if ($seo->ogimage && File::exists(public_path('uploads/seo/' . $seo->ogimage))) {
            File::delete(public_path('uploads/seo/' . $seo->ogimage));
        }

        // Delete Twitter image
        if ($seo->twitter_image && File::exists(public_path('uploads/seo/' . $seo->twitter_image))) {
            File::delete(public_path('uploads/seo/' . $seo->twitter_image));
        }

        $seo->delete();

        return redirect('admin/seo')->with('message', 'SEO deleted successfully.');
    }
}
