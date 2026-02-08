<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CEO;
use Illuminate\Support\Facades\Storage;

class CEOController extends Controller
{
    public function edit()
    {
        $ceo = CEO::first(); // assuming only one CEO record
        return view('admin.ceo.edit', compact('ceo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ceo = CEO::first();
        if (!$ceo) {
            $ceo = new CEO();
        }

        $ceo->name = $request->name;
        $ceo->message = $request->message;

        if ($request->hasFile('photo')) {
            if ($ceo->photo) {
                Storage::delete('public/ceo/'.$ceo->photo);
            }
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $request->photo->storeAs('public/ceo', $fileName);
            $ceo->photo = $fileName;
        }

        $ceo->save();

        return redirect()->back()->with('success', 'CEO info updated successfully!');
    }
}
