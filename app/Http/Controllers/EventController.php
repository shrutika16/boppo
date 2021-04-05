<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Events, Bookings, BookingTickets};
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

    public function generateSeats(Request $request) {

        // dd($request->all());
        // create bookings
        $booking = Bookings::create([
            'event_id' => $request->event_id,
            'no_of_seats' => count($request->seat),
            'total_price' => $request->total_price
        ]);

        //create bookings tickets
        foreach ($request->seat as $seat) {
            $seat_params = explode('_', $seat);
            $seat_no = $seat_params[0];
            $seat_category_id = $seat_params[1];
            $seat_single_price = $seat_params[2];

            $booking_tickets = BookingTickets::create([
                'booking_id' => $booking->id,
                'seat_category_id' => $seat_category_id,
                'seat_number' => $seat_no,
                'seat_price' => $seat_single_price
            ]);
        }

        // thankyou page redirect
        return [
            'success'=> true
        ];
    }

    public function thankyou(){
        return view('thankyou');
    }
}
