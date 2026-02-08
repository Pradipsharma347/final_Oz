<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\CEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\TeamMember;

class AdminController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_id', $admin->id);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Dashboard
    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login.form');
        }

        $contacts = Contact::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $blogs = Blog::latest()->get();
        $ceo = CEO::first();
        $teamMembers = TeamMember::all(); // ✅ Add team members

        return view('admin.dashboard', compact(
            'contacts',
            'testimonials',
            'blogs',
            'ceo',
            'teamMembers'
        ));
    }

    // Logout
    public function logout()
    {
        Session::forget('admin_id');
        return redirect()->route('admin.login.form');
    }

    // Delete contact
    public function deleteContact($id)
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login.form');
        }

        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();
            return redirect()->route('admin.dashboard')
                ->with('success', 'Contact deleted successfully!');
        }

        return redirect()->route('admin.dashboard')
            ->with('error', 'Contact not found!');
    }

    // Update CEO Name & Message
    public function updateCEOInfo(Request $request)
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login.form');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $ceo = CEO::first();
        if (!$ceo) {
            $ceo = new CEO();
        }

        $ceo->name = $request->name;
        $ceo->message = $request->message;
        $ceo->save();

        return redirect()->route('admin.dashboard')->with('success', 'CEO info updated successfully!');
    }

    // Upload / Replace CEO Image
    public function updateCEOImage(Request $request)
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login.form');
        }

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = public_path('ceo/ceo.jpg');

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $request->file('photo')->move(public_path('ceo'), 'ceo.jpg');

        return redirect()->route('admin.dashboard')->with('success', 'CEO image uploaded successfully!');
    }

    // Delete CEO Image
    public function deleteCEOImage()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login.form');
        }

        $imagePath = public_path('ceo/ceo.jpg');

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        return redirect()->route('admin.dashboard')->with('success', 'CEO image deleted successfully!');
    }

    // ------------------- Team Member CRUD -------------------

    // Store new team member
    public function storeTeam(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/team'), $imageName);

        TeamMember::create([
            'name' => $request->name,
            'image' => $imageName
        ]);

        return back()->with('success', 'Team member added successfully!');
    }

    // Edit team member form
    public function editTeam($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team_edit', compact('member'));
    }

    // Update team member
    public function updateTeam(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if (file_exists(public_path('uploads/team/'.$member->image))) {
                unlink(public_path('uploads/team/'.$member->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/team'), $imageName);
            $member->image = $imageName;
        }

        $member->name = $request->name;
        $member->save();

        return redirect()->route('admin.dashboard')->with('success', 'Team member updated successfully!');
    }

    // Delete team member
    public function deleteTeam($id)
    {
        $member = TeamMember::findOrFail($id);

        if (file_exists(public_path('uploads/team/'.$member->image))) {
            unlink(public_path('uploads/team/'.$member->image));
        }

        $member->delete();

        return back()->with('success', 'Team member deleted successfully!');
    }
}
