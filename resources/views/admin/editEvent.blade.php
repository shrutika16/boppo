@extends('admin.layouts.app')
@push('header-css')
    <!--Requirement jQuery-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!--Load Script and Stylesheet -->
	<link type="text/css" href="{{ asset('jquery.simple-dtpicker.css') }}" rel="stylesheet" />
	<!---->
@endpush
@section('content')

    <div class="container">
        <div class="row justify-content-between page-heading-tool">
            <div class="col-12">
                <div class="outter-light-box">
                    <div class="box-content">
                        <form method="POST" action="{{ route('event.update' , $events->id) }}">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Event Name</label>
                                    <input type="text" class="form-control" id="eventName" name="eventName" placeholder="Event Name" value="{{ $events->name }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">No of seats</label>
                                    <input type="text" class="form-control" id="no_of_seats" name="no_of_seats" placeholder="No Of Seats"  value="{{ $events->no_of_seats }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Event Date</label>
                                    <input type="text"  class="form-control"  name="event_date" id="event_date" value="{{ $events->event_datetime }}">
                                </div>

                            </div>
                            <hr>
                            <div class="form-group">
                                <h1>#Seats</h1>
                                <table id="events_list" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Seat Category</th>
                                            <th>Seats No</th>
                                            <th>Single Seat Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_price= 0;
                                        @endphp
                                        @foreach ($seatCategories as $key => $seat)
                                        @php
                                            $total_price += $seat->total_price;
                                        @endphp
                                            <tr>
                                                <td>#{{ $key + 1 }}</td>
                                                <td>{{ $seat->name }}</td>
                                                <td>
                                                    <span id="seat_no_{{ $seat->seat_category_id }}"> {{ $seat->seat_no_from }}-{{ $seat->seat_no_to }} </span>
                                                    <input type="hidden" name="seatno[{{ $seat->seat_category_id }}]" id="seatno_{{ $seat->seat_category_id }}" value="{{ $seat->seat_no_from }}-{{ $seat->seat_no_to }}">
                                                    <input type="hidden" name="total_seats[{{ $seat->seat_category_id }}]" id="total_seats_{{ $seat->seat_category_id }}">
                                                </td>
                                                <td id='category_price'>
                                                    <input
                                                        type="text"
                                                        name="single_price[{{ $seat->seat_category_id }}]"
                                                        id="single_price_{{ $seat->seat_category_id }}"
                                                        class="single_price {{ (($key == 0) ? 'master_category': 'calculate_price' ) }}"
                                                        placeholder="Single Seat Price"
                                                        data-catid='{{ $seat->seat_category_id }}'
                                                        data-pricepercentage='{{ $seat->price_percentage }}'
                                                        value="{{ $seat->seat_price }}"
                                                    >
                                                </td>
                                                <td>
                                                    <span id="price_{{ $seat->seat_category_id }}">₹{{ $seat->total_price }}</span>
                                                    <input
                                                        type="hidden"
                                                        value="{{ $seat->total_price }}"
                                                        name="category_price[{{ $seat->seat_category_id }}]"
                                                        id="category_price_{{ $seat->seat_category_id }}"
                                                    >
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td  class="text-right" colspan="4"> Total Amount </td>
                                            <td>
                                                <span id="total_price">₹{{ $total_price }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
