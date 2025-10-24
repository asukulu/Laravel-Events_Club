<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\HomeController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LikeController;

// ----------------------
// Authentication Routes
// ----------------------
Auth::routes();

// ----------------------
// Public Routes (Anyone can access)
// ----------------------

// Home & Main Pages
Route::get('/', function () {
    $events = Event::orderBy('date', 'ASC')->limit(6)->get();
    return view('components.splash', compact('events'));
})->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->name('index');

// Events - Public Views
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Event Categories (MUST come before /events/{slug} to avoid conflicts)
Route::get('/events/culture', [EventController::class, 'culture'])->name('events.culture');
Route::get('/sport', [EventController::class, 'sport'])->name('events.sport');
Route::get('/others', [EventController::class, 'others'])->name('events.others');

// Search & Contact
Route::get('/search', [EventController::class, 'search'])->name('events.search');
Route::get('/contact', [EventController::class, 'contact'])->name('events.contact');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// ----------------------
// Authenticated User Routes
// ----------------------
Route::middleware(['auth'])->group(function () {
    
    // Event Management (CRUD operations) - Specific routes BEFORE show route
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::patch('/events/{event}', [EventController::class, 'update']);
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    
    // Booking System
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/add', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{rowid}', [BookingController::class, 'destroy'])->name('booking.destroy');
    
    // Likes System
    Route::post('/events/{event}/like', [LikeController::class, 'toggle'])->name('events.like');
});

// Show single event - MUST be LAST to avoid catching other /events/* routes
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');

// ----------------------
// Admin Routes
// ----------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/events', function() {
        $events = Event::orderBy('date', 'DESC')->paginate(15);
        return view('admin.events.index', compact('events'));
    })->name('events.index');
});