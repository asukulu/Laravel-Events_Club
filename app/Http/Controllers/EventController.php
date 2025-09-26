<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function __construct()
{
$this->middleware('auth')->except(['index','show','search','culture','sport', 'others','contact']);

}
    


    public function index()
{
    // display events by date order and paginate
    $events = Event::orderBy('date', 'ASC')->paginate(4);

    // pass events to the view
    // send events to the view
    return view('events.index', compact('events'));
}

    // Show a specific event
        public function show($slug)
        {
           
            $event = Event::where('slug', $slug)->firstOrFail();
    
            return view('events.show')->with('event', $event);
    
        }
// Search function
        public function search()
        {
request()->validate([
   'search' => 'required|min:2'


]);
      
{
        ($search = request()->input('search'));
      

        $events = Event::where('name', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%")
                ->orWhere('organiser', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('date', 'like', "%$search%")
                ->paginate(4);
                

                return view('events.search', compact('events'));
               
        
                ;
    }
    }


// Culture
public function culture()
{
    $search = request()->input('search', '');

    $events = Event::where('name', 'like', "%culture%")
        ->orWhere('title', 'like', "%$search%")
        ->orWhere('organiser', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->paginate(4);

    return view('events.culture', compact('events'));
}

public function sport()
{
    $search = request()->input('search', '');

    $events = Event::where('name', 'like', "%sport%")
        ->orWhere('title', 'like', "%$search%")
        ->orWhere('organiser', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->paginate(4);

    return view('events.sport', compact('events'));
}

// Others
   public function others()
{
    $search = request()->input('search', '');

    $events = Event::where('name', 'like', "%others%")
        ->orWhere('title', 'like', "%$search%")
        ->orWhere('organiser', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->paginate(4);

    return view('events.others', compact('events'));
}

    
// Contact page
   public function contact()
{
    $search = request()->input('search', '');

    $events = Event::where('name', 'like', "%contact%")
        ->orWhere('title', 'like', "%$search%")
        ->orWhere('organiser', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->paginate(4);

    return view('events.contact', compact('events'));
}

        
    // Show the form for creating a new resource.

        public function create()
{
    return view('events.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('events', 'public');
    }

    Event::create($validated);

    return redirect()->route('events.index')->with('success', 'Event created successfully!');
}

public function edit(Event $event)
{
    return view('events.edit', compact('event'));
}

public function update(Request $request, Event $event)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('events', 'public');
    }

    $event->update($validated);

    return redirect()->route('events.index')->with('success', 'Event updated successfully!');
}

public function destroy(Event $event)
{
    $event->delete();

    return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
}

}