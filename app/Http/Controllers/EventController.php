<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Display list of events
    public function index()
    {
        $events = Event::orderBy('date', 'ASC')->paginate(4); // Changed from 12 to 4
        return view('events.index', compact('events'));
    }

    // Show a single event
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));
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
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $validated['image'] = '/img/' . $imageName;
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

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path($event->image))) {
                unlink(public_path($event->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $validated['image'] = '/img/' . $imageName;
        }

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Delete event
    public function destroy(Event $event)
    {
        if ($event->image && file_exists(public_path($event->image))) {
            unlink(public_path($event->image));
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
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
            ->paginate(4); // Changed from 12 to 4

        return view('events.search', compact('events'));
    }

    // Filter by category
    public function culture() { return $this->filterByCategory('culture'); }
    public function sport()   { return $this->filterByCategory('sport'); }
    public function others()  { return $this->filterByCategory('others'); }
    public function contact() { return view('events.contact'); }

    private function filterByCategory($category)
    {
        $search = request()->input('search', '');
        
        $events = Event::where('name', $category);
        
        if (!empty($search)) {
            $events->where(function($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                      ->orWhere('organiser', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
            });
        }
        
        $events = $events->orderBy('date', 'ASC')->paginate(4); // Changed from 12 to 4

        return view("events.$category", compact('events'));
    }
}