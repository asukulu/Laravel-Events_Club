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

    
        public function show($slug)
        {
           //
            $event = Event::where('slug', $slug)->firstOrFail();
    
            return view('events.show')->with('event', $event);
    
        }

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
                

                return view('events.search')->with('events', $events)
               
        
                ;
    }
    }



public function culture()
  
      
{
        $search = request();
      

        $events = Event::where('name', 'like', "%culture%")
        ->orWhere('title', 'like', "%$search%")
        ->orWhere('organiser', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->paginate(4);
        
                

                return view('events.culture')->with('events', $events)
               
        
                ;
    }
    

    
public function sport()
  
      
{
        $search = request();
        //$events = Event::where('category', 'sport')->get();

        $events = Event::where('name', 'like', "%sport%")
        ->orWhere('title', 'like', "%$search%")
        ->orWhere('organiser', 'like', "%$search%")
        ->orWhere('description', 'like', "%$search%")
        ->paginate(4);
        

                // return view('events.sport', compact('events'));
                 return view('events.sport', compact('events'));
               
        
                ;
    }


    public function others()
  
      
    {
            $search = request();
          
    
            $events = Event::where('name', 'like', "%others%")
            ->orWhere('title', 'like', "%$search%")
            ->orWhere('organiser', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->paginate(4);
            
    
                    return view('events.others')->with('events', $events)
                   
            
                    ;
        }
    
    

    public function contact()
  
      
    {
            $search = request();
          
    
            $events = Event::where('name', 'like', "%contact%")
            ->orWhere('title', 'like', "%$search%")
            ->orWhere('organiser', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->paginate(4);
            
    
                    return view('events.contact')->with('events', $events)
                   
            
                    ;
        }
    
}