<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events;
use DB;

class EventController extends Controller
{
    public function detail(Request $request, $slug) {
        if (empty($slug)) {
            return redirect('/');
        }

        $end = explode('-', $slug);
        if (empty(end($end))) {
            return redirect('/');
        }

        $event_id = end($end);

        // Find event details
        $event = Events::with('seats')->find($event_id);
        if (empty($event)) {
            return redirect('/');
        }

        // Event seats
        $seats = [];
        foreach ($event->seats as $seat) {
            for ($i=$seat->seat_no_from; $i<=$seat->seat_no_to; $i++) {
                $seats[$seat->id][] = $i;
            }
        }

        // Booked seats
        $booked = DB::table('booking_tickets')
            ->select('booking_tickets.seat_number')
            ->join('bookings', 'bookings.id', '=', 'booking_tickets.booking_id')
            ->where('bookings.event_id', '=', $event_id)
            ->pluck('booking_tickets.seat_number')->toArray();
        
        return view('event', compact(
            'event',
            'seats',
            'booked'
        ));
    }

    public function generateSeats() {

    }
}
