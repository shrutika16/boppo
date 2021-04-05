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
                        <form method="POST" action="{{ route('event.store') }}">
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
                                    <input type="text" class="form-control" id="eventName" name="eventName" placeholder="Event Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">No of seats</label>
                                    <input type="text" class="form-control" id="no_of_seats" name="no_of_seats" placeholder="No Of Seats">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Event Date</label>
                                    <input type="text"  class="form-control"  name="event_date" id="event_date" value="">
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
                                        @foreach ($seatCategories as $key => $seatCategory)
                                            <tr>
                                                <td>#{{ $key + 1 }}</td>
                                                <td>{{ $seatCategory->name }}</td>
                                                <td>
                                                    <span id="seat_no_{{ $seatCategory->id }}"> NA - NA </span>
                                                    <input type="hidden" name="seatno[{{ $seatCategory->id }}]" id="seatno_{{ $seatCategory->id }}" value="25">
                                                </td>
                                                <td id='category_price'>
                                                    <input
                                                        type="text"
                                                        name="single_price[{{ $seatCategory->id }}]"
                                                        id="single_price_{{ $seatCategory->id }}"
                                                        class="single_price {{ (($key == 0) ? 'master_category': '' ) }}"
                                                        placeholder="Single Seat Price"
                                                        data-catid='{{ $seatCategory->id }}'
                                                        data-pricepercentage='{{ $seatCategory->price_percentage }}'
                                                        data-percentecate='{{ $seatCategory->percentage_of_category_id }}'
                                                    >
                                                </td>
                                                <td>
                                                    <span id="price_{{ $seatCategory->id }}">0</span>
                                                    <input type="hidden" value="" name="category_price[{{ $seatCategory->id }}] " id="category_price_{{ $seatCategory->id }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td  class="text-right" colspan="4"> Total Amount </td>
                                            <td>
                                                <input type="hidden" value="" name="total_amount" id="total_amount">
                                                <span id="total_price">0</span>
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
@push('footer-scripts')
<script>
    $(document).ready(function() {
        $(".master_category").blur(function () {
            var master_category = $('.master_category').val();
            console.log('master' + master_category);
            $(".single_price").each(function (index) {

                var category_id = $(this).attr("data-catid");

                var category_price = $('#single_price_' + category_id).val();

                var pricepercentage = $(this).attr("data-pricepercentage");
                var percentecate = $(this).attr("data-percentecate");
                console.log('category' + category_id);
                if (pricepercentage != '') {

                }
            });
        });
    });

</script>
@endpush
