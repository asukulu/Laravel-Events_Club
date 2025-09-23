<?php
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Home route
Route::get('/', [MainController::class, 'index'])->name('welcome');
Route::get('/home', [MainController::class, 'index'])->name('home');

// Booking routes
Route::group(['middleware' => ['auth']], function() {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking/add', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{rowid}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
});

// Events routes
Route::get('/welcome', [EventController::class, 'index'])->name('events.index');
Route::get('/welcome/{slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/search', [EventController::class, 'search'])->name('events.search');
Route::get('/culture', [EventController::class, 'culture'])->name('events.culture');
Route::get('/sport', [EventController::class, 'sport'])->name('events.sport');
Route::get('/others', [EventController::class, 'others'])->name('events.others');
Route::get('/contact', [EventController::class, 'contact'])->name('events.contact');

// Authentication routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [EventController::class, 'index']);
