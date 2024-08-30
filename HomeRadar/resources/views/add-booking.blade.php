@extends('layouts.main-two')

@section('title', 'Add Booking')

@section('content')
<div class="dashboard-content">
    <div class="container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Add Booking</span></div>
        </div>
        <!-- dashboard-title end -->

        <!-- Add the form action and method -->
        <form action="{{ route('user_bookings.store') }}" method="POST" id="bookingForm" class="shadow-lg p-4 rounded bg-white">
            @csrf
            <!-- dasboard-widget-box  end-->
            <!-- dasboard-widget-title -->
            <div class="dasboard-widget-title dwb-mar fl-wrap mb-4" id="sec2">
                <h5><i class="fas fa-calendar-alt"></i> Booking Details</h5>
            </div>
            <!-- dasboard-widget-title end -->
            <!-- dasboard-widget-box  -->
            <div class="dasboard-widget-box fl-wrap">
                <div class="custom-form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="start_month_input" class="form-label">Select Start Month</label>
                            <input type="month" name="start_date" class="form-control" placeholder="Select Start Month" required id="start_month_input"/>
                        </div>
                        <div class="col-md-6">
                            <label for="end_month_input" class="form-label">Select End Month</label>
                            <input type="month" name="end_date" class="form-control" placeholder="Select End Month" required id="end_month_input"/>
                        </div>
                        <div class="col-md-6">
                            <label for="payment_status" class="form-label">Payment Status</label>
                            <select name="payment_status" class="form-control" required>
                                <option value="paid">Paid</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="client_id" class="form-label">Client</label>
                            <select name="client_id" class="form-control" required>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="property_id" class="form-label">Property</label>
                            <select name="property_id" class="form-control" required id="property_select">
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}" data-price="{{ $property->price }}">{{ $property->property_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- dasboard-widget-box  end-->

            <button type="submit" class="btn btn-primary mt-4" id="saveBookingBtn">Save Booking</button>
        </form>

        <div class="limit-box fl-wrap mt-5"></div>
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
                confirmButtonText: 'Yes, save it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create a hidden input for total_price
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'total_price',
                        value: totalPrice
                    }).appendTo('#bookingForm');

                    $('#bookingForm').submit(); // Submit the form if the user confirms
                }
            });
        });
    });
</script>
@endpush
