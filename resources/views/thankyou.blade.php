@extends('templates.layout')

@section('content')

    <style>
    .thankyou {
        margin-bottom:15px;
        text-align: center;
        }
    </style>

    <div class="container">
        <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="thankyou">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>Aww yeah, you successfully done booking.</p>
                            <hr>
                            <p class="mb-0">please contact us if having any queries.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection
