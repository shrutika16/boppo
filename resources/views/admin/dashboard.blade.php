@extends('admin.layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-between page-heading-tool">
            <div class="col-6">
                <h6>My Events</h6>
                {{-- <a href="http://website.com/{{ auth()->user()->profile_url }}" target="__blank">website.com/{{ auth()->user()->profile_url }}</a> --}}
            </div>
            <div class="col-4 text-right">
                <a href="" class="btn btn-light btn-bordered"> + New Event </a>
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
                                    <th>Total Revenue</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >1</td>
                                    <td >1</td>
                                    <td >1</td>
                                    <td >1</td>
                                    <td >1</td>
                                    <td >1</td>
                                </tr>
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

        <div class="row">

        </div>

    </div>

@endsection
