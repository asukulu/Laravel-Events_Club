<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the email
        $request->validate([
            'email' => 'required|email|unique:newsletters'
        ]);

        // Save the email to the database
        Newsletter::create(['email' => $request->email]);

        return back()->with('success', 'Thank you for subscribing!');
    }
}
