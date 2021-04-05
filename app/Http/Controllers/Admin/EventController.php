<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\{SeatCategories, Events, EventSeats};
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(){

        $seatCategories = SeatCategories::orderBy('price_order', 'ASC')->get();
        return view('admin.addEvent', compact('seatCategories'));
    }

    public function seatsArrange($no_of_seats){
        return getseatsArrange($no_of_seats);
    }

    public function store(Request $request) {
        // validation
        $request->validate([
            'eventName' => 'required',
            'no_of_seats' => 'required|integer',
            'event_date' => 'required'
        ]);

        // Store Event
        $event = Events::create(
           [
                'name' => $request->eventName,
                'no_of_seats' => $request->no_of_seats,
                'event_datetime' =>  $request->event_date,
                'deleted_at'  => date('Y-m-d h:i:s')
           ]
        );

        foreach ($request->seatno as $key => $seat) {
            $seatArr = explode('-', $seat);
            $fromSeatNo = $seatArr[0];
            $toSeatNo =  $seatArr[1];
            // Store Event Seats
            EventSeats::create(
                [
                    'event_id' => $event->id,
                    'seat_category_id' => $key,
                    'seat_no_from' => $fromSeatNo,
                    'seat_no_to'  => $toSeatNo,
                    'seat_price'  => $request->single_price[$key],
                    'total_price'  => $request->category_price[$key]
                ]
            );
        }

        //redirect
        return redirect()->route('dashboard.show')->with('status', 'Event Added!');
    }

    public function edit($id){
        $events = Events::with('seats')->where('id', $id)->first();

        // $seatCategories = SeatCategories::orderBy('price_order', 'ASC')->get();
        $seatCategories = DB::table('event_seats as es')
                            ->select('es.*','sc.price_percentage', 'sc.name')
                            ->join('seats_categories as sc','sc.id','=','es.seat_category_id')
                            ->where('es.event_id', $id)
                            ->orderBy('sc.price_order','ASC')
                            ->get();
        // dd($seatCategories);

        return view('admin.editEvent', compact('events', 'seatCategories'));
    }

    public function update(Request $request, $id)
    {
        // validation
        $request->validate([
            'eventName' => 'required',
            'no_of_seats' => 'required|integer',
            'event_date' => 'required'
        ]);

        // Store Event
        $event = Events::where('id', $id)
            ->update(
            [
                'name' => $request->eventName,
                'no_of_seats' => $request->no_of_seats,
                'event_datetime' =>  $request->event_date
            ]
        );

        foreach ($request->seatno as $key => $seat) {
            $seatArr = explode('-', $seat);
            $fromSeatNo = $seatArr[0];
            $toSeatNo =  $seatArr[1];
            // Store Event Seats
            EventSeats::where('seat_category_id', $key)
                ->update(
                [
                    'seat_no_from' => $fromSeatNo,
                    'seat_no_to'  => $toSeatNo,
                    'seat_price'  => $request->single_price[$key],
                    'total_price'  => $request->category_price[$key]
                ]
            );
        }

        //redirect
        return redirect()->route('dashboard.show')->with('status', 'Event updated!');
    }

    public function delete($id){

        Events::destroy($id);

        EventSeats::where('event_id', $id)->delete();

        //redirect
        return redirect()->route('dashboard.show')->with('status', 'Event deleted!');
    }
}
