<?php
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\HomeController;
use App\Models\Event;  // ← Add this line
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\LikeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ----------------------
// Public routes (anyone can access)
// ----------------------

// Home page route showing events list
//Route::get('/', [EventController::class, 'index'])->name('welcome');
Route::get('/', [EventController::class, 'home'])->name('welcome');

// Alternative events listing (index page for all events)
//Route::get('/welcome', [EventController::class, 'index'])->name('events.index');

// List of all events (public view)
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Show a single event by slug (dynamic route)
Route::get('/welcome/{slug}', [EventController::class, 'show'])->name('events.show');

// Search events by keyword
Route::get('/search', [EventController::class, 'search'])->name('events.search');

// Show culture-related events
Route::get('/culture', [EventController::class, 'culture'])->name('events.culture');

// Show sport-related events
Route::get('/sport', [EventController::class, 'sport'])->name('events.sport');

// Show other category events
Route::get('/others', [EventController::class, 'others'])->name('events.others');

// Contact page
Route::get('/contact', [EventController::class, 'contact'])->name('events.contact');

// Newsletter subscription (can be public or authenticated based on your needs)
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Authentication routes
Auth::routes();

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('index');
    
    // Booking routes
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/add', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{rowid}', [BookingController::class, 'destroy'])->name('booking.destroy');
});

// Event management routes (authenticated users can manage events)
Route::middleware(['auth'])->group(function () {
    Route::resource('events', EventController::class)->except(['index', 'show']);
});

//Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
   // Route::resource('events', AdminEventController::class);
//});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
});

// Homepage route - show the splash/welcome page
Route::get('/', function () {
    $events = Event::orderBy('date', 'ASC')->limit(6)->get(); // Show few events on homepage
    return view('components.splash', compact('events'));
})->name('welcome');


// Events listing page - for browsing/booking events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Add Music events route if you want to implement it
Route::get('/music', [EventController::class, 'music'])->name('events.music');
// Like/Unlike event route

Route::post('/events/{event}/like', [LikeController::class, 'toggle'])->name('events.like');


