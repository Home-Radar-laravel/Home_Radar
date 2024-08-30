@extends('layouts.app-two')

@section('title', 'Edit Booking')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Edit Booking</h1>
        <a href="{{ route('bookings.index') }}" class="btn btn-primary">Back to Bookings</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Edit Booking Details
        </div>
        <div class="card-body">
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST" id="editBookingForm">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="start_month_input" class="form-label">Select Start Month</label>
                        <input type="month" name="start_date" class="form-control" placeholder="Select Start Month" required id="start_month_input" value="{{ \Carbon\Carbon::parse($booking->start_date)->format('Y-m') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="end_month_input" class="form-label">Select End Month</label>
                        <input type="month" name="end_date" class="form-control" placeholder="Select End Month" required id="end_month_input" value="{{ \Carbon\Carbon::parse($booking->end_date)->format('Y-m') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="payment_status" class="form-label">Payment Status</label>
                        <select name="payment_status" class="form-control" required>
                            <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="pending" {{ $booking->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="client_id" class="form-label">Client</label>
                        <select name="client_id" class="form-control" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $booking->client_id == $client->id ? 'selected' : '' }}>{{ $client->client_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="property_id" class="form-label">Property</label>
                        <select name="property_id" class="form-control" required id="property_select">
                            @foreach($properties as $property)
                                <option value="{{ $property->id }}" data-price="{{ $property->price }}" {{ $booking->property_id == $property->id ? 'selected' : '' }}>{{ $property->property_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-4" id="saveBookingBtn">Update Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Disable past dates in the month input fields
        var today = new Date();
        var year = today.getFullYear();
        var month = String(today.getMonth() + 1).padStart(2, '0');
        $('#start_month_input').attr('min', year + '-' + month);
        $('#end_month_input').attr('min', year + '-' + month);

        $('#saveBookingBtn').on('click', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately

            // Get the selected start and end dates
            var startDate = $('#start_month_input').val();
            var endDate = $('#end_month_input').val();

            // Get the selected property price
            var propertyPrice = $('#property_select option:selected').data('price');

            // Calculate the number of months
            var start = new Date(startDate);
            var end = new Date(endDate);
            var numberOfMonths = (end.getFullYear() - start.getFullYear()) * 12 + (end.getMonth() - start.getMonth()) + 1;

            // Calculate the total price
            var totalPrice = numberOfMonths * propertyPrice;

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "The total price is " + totalPrice + ". Do you want to proceed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create a hidden input for total_price
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'total_price',
                        value: totalPrice
                    }).appendTo('#editBookingForm');

                    $('#editBookingForm').submit(); // Submit the form if the user confirms
                }
            });
        });
    });
</script>
@endpush
