@extends('admin.layouts.app')

@section('content')

    <div class="container">

        <div class="outter-light-box">

            <div class="box-header">
                <nav class="nav">
                    <a class="nav-link">Total : {{ count($profiles) }}</a>
                </nav>
            </div>
            <div class="box-content">
                <table id="tests_list" class="table">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Lead Acquisition Cost</th>
                            <th>Offer Price</th>
                            <th>Last Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $profile->title }}</td>
                            <td>₹ {{ $profile->price }}</td>
                            <td>₹ {{ $profile->lead_acquisition_cost }}</td>
                            <td>₹ {{ $profile->offer_price }}</td>
                            <td>{{ $profile->updated_at }}</td>
                            <td>
                            <a href="{{ route('tests.edit', $profile->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a  onclick="return confirm('You really want to delete this?')" href="{{ route('tests.destroy', $profile->id) }}" class="btn btn-sm btn-danger btn-delete">Remove</a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection

@push('footer-scripts')

@endpush
