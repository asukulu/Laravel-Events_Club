<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\HomeController;
use App\Models\Event;
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
Route::get('/welcome/{slug}', [EventController::class, 'show'])->name('events.show');

// Event Categories
//Route::get('/culture', [EventController::class, 'culture'])->name('events.culture');
Route::get('/events/culture', [EventController::class, 'culture'])->name('events.culture');

Route::get('/sport', [EventController::class, 'sport'])->name('events.sport');
Route::get('/others', [EventController::class, 'others'])->name('events.others');
Route::get('/music', [EventController::class, 'music'])->name('events.music');

// Search & Contact
Route::get('/search', [EventController::class, 'search'])->name('events.search');
Route::get('/contact', [EventController::class, 'contact'])->name('events.contact');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// ----------------------
// Authenticated User Routes
// ----------------------
Route::middleware(['auth'])->group(function () {
    
    // Event Management (CRUD operations)
    Route::resource('events', EventController::class)->except(['index', 'show']);
    
    // Booking System
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/add', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{rowid}', [BookingController::class, 'destroy'])->name('booking.destroy');
    
    // Likes System
    Route::post('/events/{event}/like', [LikeController::class, 'toggle'])->name('events.like');
});

// ----------------------
// Admin Routes
// ----------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
});