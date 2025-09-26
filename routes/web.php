<?php
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\EventController as AdminEventController;

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

// Public routes
Route::get('/', [EventController::class, 'index'])->name('welcome');
//Route::get('/welcome', [EventController::class, 'index'])->name('events.index');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/welcome/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/search', [EventController::class, 'search'])->name('events.search');
Route::get('/culture', [EventController::class, 'culture'])->name('events.culture');
Route::get('/sport', [EventController::class, 'sport'])->name('events.sport');
Route::get('/others', [EventController::class, 'others'])->name('events.others');
Route::get('/contact', [EventController::class, 'contact'])->name('events.contact');

// Newsletter subscription (can be public or authenticated based on your needs)
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Authentication routes
Auth::routes();

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
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
