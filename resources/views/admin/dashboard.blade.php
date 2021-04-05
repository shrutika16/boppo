@extends('admin.layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-between page-heading-tool">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-6">
                <h6>My Events</h6>
                {{-- <a href="http://website.com/{{ auth()->user()->profile_url }}" target="__blank">website.com/{{ auth()->user()->profile_url }}</a> --}}
            </div>
            <div class="col-4 text-right">
                <a href="{{ route('event.add') }}" class="btn btn-light btn-bordered"> + New Event </a>
            </div>
        </div>
        <div class="row justify-content-between page-heading-tool">
            <div class="col-12">
                <div class="outter-light-box">
                    <div class="box-content">
                        <table id="events_list" class="table">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Name</th>
                                    <th>No Of Seats</th>
                                    <th>Total Bookings</th>
                                    <th>Total Revenue</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $key => $event)
                                    @php
                                    $totalRevenue = $event->bookings->sum(function($value) {
                                        return $value->total_price;
                                    });
                                    $totalBookings = $event->bookings->count(function($value) {
                                        return $value->total_price;
                                    });
                                    @endphp
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->no_of_seats }}</td>
                                        <td>{{ $totalBookings }}</td>
                                        <td>₹{{ $totalRevenue }}</td>
                                        <td>
                                            <a href="{{ route('event.edit',  $event->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('event.delete',  $event->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>
                                        <td >{{ (($event->status == 1) ? 'Active' : 'In-Active') }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif

    </div>

@endsection
