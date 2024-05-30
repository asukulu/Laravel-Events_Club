<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        // this is to display the welcome page with event table details on it
            return view('welcome')->with([
                'events'=> Event::all(),
            ]);
        }
    }
