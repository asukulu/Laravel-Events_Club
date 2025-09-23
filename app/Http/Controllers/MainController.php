<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // Fetch upcoming events ordered by date, paginated
        $events = Event::orderBy('date', 'ASC')->paginate(4);
  // Pass events to splash.blade.php
        return view('splash', compact('events'));
    }
}


