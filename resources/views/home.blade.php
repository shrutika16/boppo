@extends('templates.layout')

@section('content')

    <style>
    .card { margin-bottom:15px; }
    </style>

    <div class="container">
        <h2>Events</h2>

        <div class="row">
            @foreach ($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <a href="/event/event-title-{{ $event->id }}" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection
