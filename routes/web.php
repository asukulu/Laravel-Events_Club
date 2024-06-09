<?php
use App\Models\Event;
use App\Models\Order;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookingController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;

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

 
Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/', 'MainController@index')->name('welcome');

//Booking routes
Route::group(['middleware' => ['auth']], function() {
    Route::get('/booking', 'BookingController@index')->name('booking.index');
    Route::post('/booking/add', 'BookingController@store')->name('booking.store');
    
    Route::delete('/booking/{rowid}', 'BookingController@destroy')->name('booking.destroy');

    // Newsletter route
    Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

});

//Events routes
Route::get('/welcome', 'EventController@index')->name('events.index');
Route::get('/welcome/{slug}', 'EventController@show' )->name('events.show');
Route::get('/search', 'EventController@search' )->name('events.search');
Route::get('/culture', 'EventController@culture' )->name('events.culture');
//Route::get('/sport', 'EventController@sport' )->name('events.sport');
Route::get('/sport', [EventController::class, 'sport'])->name('events.sport');

Route::get('/others', 'EventController@others' )->name('events.others');
Route::get('/contact', 'EventController@contact' )->name('events.contact');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
