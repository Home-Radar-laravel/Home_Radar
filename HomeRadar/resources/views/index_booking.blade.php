@extends('layouts.app-two')

@section('content')
<div class="container-fluid"> <!-- Changed to container-fluid for full-width -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Bookings List</h1>
        <a href="{{ route('bookings.create') }}" class="btn btn-success" style="background-color: #28a745; border-color: #28a745;">Add New Booking</a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Total Bookings: <span class="badge bg-light text-dark">{{ $totalBookings }}</span>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped table-bordered mb-0 w-100">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Property Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Price</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->client->client_name }}</td>
                        <td>{{ $booking->property->property_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('F Y') }}</td>
                        <td>${{ number_format($booking->total_price, 2) }}</td>
                        <td>
                            <span class="badge {{ $booking->payment_status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-sm mb-2" style="background-color: #17a2b8; border-color: #17a2b8; color: white;">View</a>
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm mb-2 text-white" style="background-color: #ffc107; border-color: #ffc107;">Edit</a>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" style="background-color: #dc3545; border-color: #dc3545; color: white;" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $bookings->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection