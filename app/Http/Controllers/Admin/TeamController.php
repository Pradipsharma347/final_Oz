<?php

namespace App\Http\Controllers\Admin;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image'
        ]);

        $img = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/team'), $img);

        TeamMember::create([
            'name' => $request->name,
            'image' => $img
        ]);

        return back()->with('success','Team member added');
    }

    public function delete($id)
    {
        $member = TeamMember::findOrFail($id);
        unlink(public_path('uploads/team/'.$member->image));
        $member->delete();

        return back();
    }
}
