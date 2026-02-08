<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Store testimonial from admin dashboard
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        // upload image
        $imageName = time().'_'.$request->image->getClientOriginalName();
        $request->image->move(public_path('uploads/testimonials'), $imageName);

        Testimonial::create([
            'name' => $request->name,
            'message' => $request->message,
            'image' => $imageName
        ]);

        return back()->with('success', 'Testimonial added successfully');
    }

    // Delete testimonial
    public function delete($id)
    {
        Testimonial::findOrFail($id)->delete();
        return back()->with('success', 'Testimonial deleted');
    }
}

