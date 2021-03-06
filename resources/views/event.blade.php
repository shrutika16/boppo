@extends('templates.layout')

@section('content')

    <style>
    .card { margin-bottom:15px; }
    .select_seat{
        border: solid 1px #CCCCCC;
        cursor: pointer;
        width: 30px;
        height: 30px;
        text-align: center;
    }
    .select_seat.selected { font-weight:bold; background-color: #0056b3; color: #FFFFFF; }
    .select_seat.booked { color: #929292; background-color: #dae0e5; border-color:#dae0e5; }
    .seats_list{  }
    .seats_list li{ list-style:none; display: inline; }
    </style>

    <div class="container">
        <h2>{{ $event->name }}</h2>

        <hr>
        <div class="row">
            <div class="col-md-8">
                <form id="event_book_form">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <h3>Choose Seats</h3>
                    @if(!empty($event->seats))
                        @foreach($event->seats as $seat)
                            <h5>{{ $seat->category->name }} : ₹{{ $seat->seat_price }}</h5>
                            <ul class="seats_list">
                                @foreach($seats[$seat->id] as $single_seat)
                                    <li>
                                        @if(!in_array($single_seat, $booked))
                                            <input
                                                type="checkbox"
                                                class="d-none"
                                                name="seat[]"
                                                value="{{ $single_seat }}_{{ $seat->category->id }}_{{ $seat->seat_price }}"
                                                id="seat_no_{{ $single_seat }}"
                                            >

                                        @endif
                                        <span
                                            class="badge badge-light select_seat
                                            @if(in_array($single_seat, $booked)) booked @endif"
                                            data-seat="seat_no_{{ $single_seat }}"
                                            data-price="{{ $seat->seat_price }}"
                                        >{{ $single_seat }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    @endif
                    <hr>
                    <h5>Total Price : ₹<span id="showTotalPrice">0</span></h5>
                    <input type="hidden" name="total_price" id="total_price" value="">
                    <hr>
                    <button type="button" class="btn btn-success" id="book_event">Book</button>
                </form>
            </div>

        </div>

    </div>

@endsection

@section('footer_script')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('/js/booking.js') }}"></script>
@endsection
