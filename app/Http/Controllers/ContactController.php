<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|string|max:20',
            'subject' => 'required|in:Enquiry,Appointment,Other',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Your message has been submitted successfully!');
    }
}
