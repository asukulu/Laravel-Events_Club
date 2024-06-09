<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        
        // Validate the email
        $request->validate([
            'email' => 'required|email'
        ]);

        // Logic to handle the subscription, e.g., save to the database or send to an external service
        // For example, you could create a Newsletter model and save the email to the database
        // Newsletter::create(['email' => $request->email]);

        return back()->with('success', 'Thank you for subscribing!');
    }
}
