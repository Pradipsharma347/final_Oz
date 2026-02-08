<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // Show blogs in admin dashboard
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.dashboard', compact('blogs'));
    }

    // Store new blog
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'image'   => 'required|image|mimes:jpg,jpeg,png',
            'content' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/blogs'), $imageName);

        Blog::create([
            'title'   => $request->title,
            'image'   => $imageName,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Blog added successfully!');
    }

    // Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if (file_exists(public_path('uploads/blogs/'.$blog->image))) {
            unlink(public_path('uploads/blogs/'.$blog->image));
        }

        $blog->delete();

        return back()->with('success', 'Blog deleted successfully!');
    }
}
