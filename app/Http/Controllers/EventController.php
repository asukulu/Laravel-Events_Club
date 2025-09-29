<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct()
    {
        // Public pages: index, show, search, culture, sport, others, contact
        $this->middleware('auth')->except([
            'index', 'show', 'search', 'culture', 'sport', 'others', 'contact'
        ]);
    }

    // Add this method to EventController
    public function home()
    {
        $events = Event::orderBy('date', 'ASC')->limit(6)->get(); // Show few events on homepage
        return view('components.splash', compact('events'));
    }

    // Display list of events
    public function index()
    {
        $events = Event::orderBy('date', 'ASC')->paginate(4);
        return view('events.index', compact('events'));
    }

    // Show a single event
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
    }

    // Search events
    public function search()
    {
        $search = request()->validate([
            'search' => 'required|min:2'
        ]);

        $query = $search['search'];

        $events = Event::where('name', 'like', "%$query%")
            ->orWhere('title', 'like', "%$query%")
            ->orWhere('organiser', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orWhere('date', 'like', "%$query%")
            ->paginate(4);

        return view('events.search', compact('events'));
    }

    // Filter by category - FIXED VERSION
    public function culture() { return $this->filterByCategory('culture'); }
    public function sport()   { return $this->filterByCategory('sport'); }
    public function others()  { return $this->filterByCategory('others'); }
    public function contact() { return view('events.contact'); }
    
    // Remove music() method unless you have music category in your database

    private function filterByCategory($category)
    {
        $search = request()->input('search', '');
        
        // First, filter by exact category match
        $events = Event::where('name', $category);
        
        // Then, if there's a search term, apply additional search filters
        if (!empty($search)) {
            $events->where(function($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                      ->orWhere('organiser', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
            });
        }
        
        $events = $events->orderBy('date', 'ASC')->paginate(4);

        return view("events.$category", compact('events'));
    }

    // Show form for creating event
    public function create()
    {
        return view('events.create');
    }

    // Store new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:events,slug',
            'organiser'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'venue'       => 'required|string|max:255',
            'date'        => 'required|date',
            'time'        => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Auto-generate slug if empty
        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    // Show edit form
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:events,slug,' . $event->id,
            'organiser'   => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'venue'       => 'required|string|max:255',
            'date'        => 'required|date',
            'time'        => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Auto-generate slug if empty
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle image upload and delete old image
        if ($request->hasFile('image')) {
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Delete event
    public function destroy(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}