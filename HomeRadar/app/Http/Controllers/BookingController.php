<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index()
    {
        // Fetch all bookings from the database, you can paginate if needed
        $bookings = Booking::with('client', 'property')->paginate(10);

        // Pass the total number of bookings and the bookings data to the view
        $totalBookings = Booking::count();

        return view('fgjghjjjhjghjjhj', compact('bookings', 'totalBookings'));
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
{
    try {
        // التحقق مما إذا كان المستخدم قد سجل الدخول
        if (!auth()->check()) {
            return redirect()->route('user.login'); // إعادة التوجيه إلى صفحة تسجيل الدخول
        }

        $clients = Client::all(); // جلب جميع العملاء
        $properties = Property::all(); // جلب جميع الممتلكات

        return view('add-booking', compact('clients', 'properties'));
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to load booking creation form', 'message' => $e->getMessage()], 500);
    }
}

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'start_date' => 'required|date_format:Y-m',
                'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
                'total_price' => 'required|numeric|min:0',
                'payment_status' => 'required|string|in:paid,pending',
                'client_id' => 'required|exists:clients,id',
                'property_id' => 'required|exists:properties,id',
            ]);

            
    
            // Convert month-year to full date by appending '-01'
            $validatedData['start_date'] = $validatedData['start_date'] . '-01';
            $validatedData['end_date'] = $validatedData['end_date'] . '-01';
    
            $booking = Booking::create($validatedData);
            return redirect()->route('payment.form');
            // return response()->json(['data' => $booking, 'message' => 'Booking created successfully'], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create booking', 'message' => $e->getMessage()], 500);
        }
    }
    

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        try {
            $booking->load(['client', 'property']);
            return response()->json(['data' => $booking], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve booking', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $clients = Client::all();
            $properties = Property::all();

            return view('bookings.edit_booking', compact('booking', 'clients', 'properties'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to load booking edit form', 'message' => 'View [edit-booking] not found.'], 500);
        }
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        try {
            $validatedData = $request->validate([
                'start_date' => 'sometimes|date_format:Y-m',
                'end_date' => 'sometimes|date_format:Y-m|after:start_date',
                'total_price' => 'sometimes|numeric|min:0',
                'payment_status' => 'sometimes|string|in:paid,pending',
                'client_id' => 'sometimes|exists:clients,id',
                'property_id' => 'sometimes|exists:properties,id',
            ]);

            if (!empty($validatedData['start_date']) && !empty($validatedData['end_date'])) {
                // Convert month-year to full date by appending '-01'
                $validatedData['start_date'] = $validatedData['start_date'] . '-01';
                $validatedData['end_date'] = $validatedData['end_date'] . '-01';

                // Check if the property is already booked during the selected dates
                $existingBooking = Booking::where('property_id', $validatedData['property_id'] ?? $booking->property_id)
                    ->where('id', '!=', $booking->id)
                    ->where(function($query) use ($validatedData) {
                        $query->whereBetween('start_date', [$validatedData['start_date'], $validatedData['end_date']])
                              ->orWhereBetween('end_date', [$validatedData['start_date'], $validatedData['end_date']]);
                    })->exists();

                if ($existingBooking) {
                    return response()->json(['error' => 'Property is already booked during the selected dates'], 422);
                }
            }

            $booking->update($validatedData);

            return response()->json(['data' => $booking, 'message' => 'Booking updated successfully'], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update booking', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy(Booking $booking)
    {
        try {
            $booking->delete();
            return response()->json(['message' => 'Booking deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete booking', 'message' => $e->getMessage()], 500);
        }
    }

    public function storeBooking(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'start_date' => 'required|date_format:Y-m',
                'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
                'total_price' => 'required|numeric|min:0',
                'payment_status' => 'required|string|in:paid,pending',
                'client_id' => 'required|exists:clients,id',
                'property_id' => 'required|exists:properties,id',
            ]);

            
    
            // Convert month-year to full date by appending '-01'
            $validatedData['start_date'] = $validatedData['start_date'] . '-01';
            $validatedData['end_date'] = $validatedData['end_date'] . '-01';
    
            $booking = Booking::create($validatedData);
            
            return redirect()->route('payment.form');
            
            // return response()->json(['data' => $booking, 'message' => 'Booking created successfully'], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create booking', 'message' => $e->getMessage()], 500);
        }
    }
    
}
