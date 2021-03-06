<?php

use Illuminate\Support\Facades\Route;

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

Route::group(
    ['prefix' => 'admin'],
    function () {
        Auth::routes();
    }
);

// Admin routes
Route::group(['prefix' => 'admin/', 'middleware' => ['auth']], function () {

    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard.show');
    Route::get('/addEvent', 'Admin\EventController@index')->name('event.add');
    Route::post('/storeEvent', 'Admin\EventController@store')->name('event.store');

    Route::get('/editEvent/{id}', 'Admin\EventController@edit')->name('event.edit');
    Route::post('/updateEvent/{id}', 'Admin\EventController@update')->name('event.update');

    Route::get('/deleteEvent/{id}', 'Admin\EventController@delete')->name('event.delete');
    Route::get('/seatsArrange/{no_of_seats}', 'Admin\EventController@seatsArrange');
});

Route::get('/password/reset', function () {
    return redirect('/');
});

Route::get('/', 'HomeController@index');
Route::get('/event/{slug}', 'EventController@detail');
Route::post('/event/book', 'EventController@generateSeats');
Route::get('/thank-you', 'EventController@thankyou')->name('thankyou');
