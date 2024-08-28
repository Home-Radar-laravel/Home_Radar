@extends('layouts.header')

@section('title', 'Add Booking')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Booking</title>
    <!-- Custom CSS -->
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #e8f0fe; /* Light blue background */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
    }
    .container {
        background-color: #ffffff;
        padding: 30px; /* Reduced padding */
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        max-width: 500px; /* Reduced max width */
        width: 80%; /* Adjusted width */
        margin-top: 50px;
    }
    .form-title {
        text-align: center;
        margin-bottom: 20px; /* Reduced margin */
        color: #333;
        font-size: 24px; /* Reduced font size */
        font-weight: bold;
    }
    .form-group {
        margin-bottom: 15px; /* Reduced margin */
        width: 100%;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #555;
        font-weight: 500;
    }
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 12px; /* Reduced padding */
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px; /* Reduced font size */
        color: #333;
        transition: border-color 0.3s ease, background-color 0.3s ease;
    }
    .form-group input:focus,
    .form-group select:focus {
        border-color: #007bff;
        background-color: #f1f8ff; /* Light blue focus background */
        outline: none;
    }
    .form-group .readonly-input {
        background-color: #e9ecef;
        cursor: not-allowed;
    }
    .form-actions {
        text-align: center;
        margin-top: 20px; /* Reduced margin */
    }
    .form-actions button {
        background-color: #28a745; /* Green background */
        color: #fff;
        padding: 10px 20px; /* Reduced padding */
        border: none;
        border-radius: 5px;
        font-size: 16px; /* Reduced font size */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .form-actions button:hover {
        background-color: #218838; /* Darker green on hover */
    }
    .total-price {
        font-size: 18px; /* Reduced font size */
        font-weight: bold;
        color: #28a745;
        margin-top: 15px;
        text-align: center;
        display: none;
    }
    /* Responsive */
    @media (max-width: 500px) {
        .container {
            padding: 15px; /* Reduced padding for small screens */
        }
        .form-title {
            font-size: 20px; /* Smaller title font size */
        }
        .form-actions button {
            width: 100%;
        }
    }
</style>




</head>
<body>

    <div class="container">
        <div class="form-title">Add Booking</div>
        <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm">
            @csrf
            <!-- Start Month -->
            <div class="form-group">
                <label for="start_month_input">Select Start Month</label>
                <input type="month" name="start_date" id="start_month_input" required>
            </div>
            <!-- End Month -->
            <div class="form-group">
                <label for="end_month_input">Select End Month</label>
                <input type="month" name="end_date" id="end_month_input" required>
            </div>
            <!-- Payment Status -->
            <div class="form-group">
                <label for="payment_status">Payment Status</label>
                <select name="payment_status" id="payment_status" required>
                    <option value="">Select Payment Status</option>
                    <option value="paid">Paid</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
            <!-- Client Selection -->
            <div class="form-group">
                <label for="client_id">Client</label>
                <select name="client_id" id="client_id" required>
                    <option value="">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Property Details (Read-Only) -->
            <div class="form-group">
                <label for="property_name">Property Name</label>
                <input type="text" id="property_name" value="{{ $properties->property_name }}" class="readonly-input" readonly>
                <input type="hidden" name="property_id" value="{{ $properties->id }}">
            </div>
            <div class="form-group">
                <label for="property_price">Property Price (per month)</label>
                <input type="number" id="property_price" value="{{ $properties->price }}" class="readonly-input" readonly>
            </div>
            <!-- Total Price Display -->
            <div class="total-price" id="total_price_display">
                Total Price: $<span id="total_price_amount">0</span>
            </div>
            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" id="saveBookingBtn">Save Booking</button>
            </div>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const startDateInput = document.getElementById('start_month_input');
            const endDateInput = document.getElementById('end_month_input');
            const propertyPriceInput = document.getElementById('property_price');
            const totalPriceDisplay = document.getElementById('total_price_display');
            const totalPriceAmount = document.getElementById('total_price_amount');
            const bookingForm = document.getElementById('bookingForm');

            // Set minimum date to current month
            const today = new Date();
            const year = today.getFullYear();
            const month = ('0' + (today.getMonth() + 1)).slice(-2);
            const minDate = `${year}-${month}`;

            startDateInput.min = minDate;
            endDateInput.min = minDate;

            function calculateTotalPrice() {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;
                const propertyPrice = parseFloat(propertyPriceInput.value);

                if (startDate && endDate && propertyPrice) {
                    const start = new Date(startDate);
                    const end = new Date(endDate);

                    if (end >= start) {
                        const months = (end.getFullYear() - start.getFullYear()) * 12 + (end.getMonth() - start.getMonth()) + 1;
                        const totalPrice = months * propertyPrice;
                        totalPriceAmount.textContent = totalPrice.toFixed(2);
                        totalPriceDisplay.style.display = 'block';

                        // Append total_price as hidden input
                        let totalPriceInput = document.getElementById('total_price_input');
                        if (!totalPriceInput) {
                            totalPriceInput = document.createElement('input');
                            totalPriceInput.type = 'hidden';
                            totalPriceInput.name = 'total_price';
                            totalPriceInput.id = 'total_price_input';
                            bookingForm.appendChild(totalPriceInput);
                        }
                        totalPriceInput.value = totalPrice.toFixed(2);
                    } else {
                        totalPriceDisplay.style.display = 'none';
                        alert('End month must be the same or after the start month.');
                    }
                } else {
                    totalPriceDisplay.style.display = 'none';
                }
            }

            // Event listeners to calculate total price on date change
            startDateInput.addEventListener('change', calculateTotalPrice);
            endDateInput.addEventListener('change', calculateTotalPrice);

            // Form submission validation
            bookingForm.addEventListener('submit', function (e) {
                if (!startDateInput.value || !endDateInput.value || !propertyPriceInput.value) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
    </script>
<!-- /osama -->
</body>
</html>
