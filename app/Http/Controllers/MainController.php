<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('components.splash', compact('events'));
    }
}
