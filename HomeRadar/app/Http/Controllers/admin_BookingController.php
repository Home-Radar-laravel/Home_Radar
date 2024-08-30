<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class admin_BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index()
    {
        try {
            $bookings = Booking::with(['client', 'property'])->get();
            $totalBookings = $bookings->count(); // Get the total count of bookings
            return view('bookings.index', ['bookings' => $bookings, 'totalBookings' => $totalBookings]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve bookings', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new booking.
     */
    
    public function create()
{
    // Get users with role_id = 3
    $clients = User::where('role_id', 3)->get();

    // Get only available properties
    $properties = Property::where('availability', 'available')->get();

    return view('bookings.create', compact('clients', 'properties'));
}
    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the data
            $validatedData = $request->validate([
                'start_date' => 'required|date_format:Y-m',
                'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
                'payment_status' => 'required|string|in:paid,pending',
                'client_id' => 'required|exists:users,id,role_id,3',
                'property_id' => 'required|exists:properties,id',
            ]);
    
            // Convert month-year to full date by appending '-01'
            $validatedData['start_date'] = \Carbon\Carbon::parse($validatedData['start_date'] . '-01')->startOfMonth()->toDateTimeString();
            $validatedData['end_date'] = \Carbon\Carbon::parse($validatedData['end_date'] . '-01')->endOfMonth()->toDateTimeString();
    
            // Calculate the difference between the dates in months
            $startDate = \Carbon\Carbon::parse($validatedData['start_date']);
            $endDate = \Carbon\Carbon::parse($validatedData['end_date']);
            $months = $startDate->diffInMonths($endDate) + 1;
    
            // Get the property and calculate the total price
            $property = Property::find($validatedData['property_id']);
            if ($property) {
                if (Booking::isDateRangeBooked($property->id, $validatedData['start_date'], $validatedData['end_date'])) {
                    return response()->json(['error' => 'The property is already booked for the selected dates'], 400);
                }
    
                $validatedData['total_price'] = $months * $property->price;
                $property->availability = 'not available';
                $property->save();
            } else {
                return response()->json(['error' => 'Property not found'], 404);
            }
    
            // Check if client exists
            $client = User::find($validatedData['client_id']);
            if (!$client) {
                return response()->json(['error' => 'Client not found'], 404);
            }
    
            // Create the booking
            $booking = Booking::create($validatedData);
    
            // return response()->json(['data' => $booking, 'message' => 'Booking created successfully'], 201);
             return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
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
            return view('bookings.show', ['booking' => $booking]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve booking', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit(Booking $booking)
{
    // Get only available properties, including the current one even if it's not available
    $properties = Property::where('availability', 'available')
        ->orWhere('id', $booking->property_id)
        ->get();

    $clients = Client::all();
    return view('bookings.edit', ['booking' => $booking, 'clients' => $clients, 'properties' => $properties]);
}

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, $id)
{
    // التحقق من صحة البيانات
    $validatedData = $request->validate([
        'client_id' => 'required|exists:users,id',
        'property_id' => 'required|exists:properties,id',
        'start_date' => 'required|date_format:Y-m',
        'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
        'payment_status' => 'required|string|in:paid,pending',
    ]);

    // تحويل start_date و end_date إلى بداية ونهاية الشهر
    $validatedData['start_date'] = \Carbon\Carbon::parse($validatedData['start_date'] . '-01')->startOfMonth()->toDateTimeString();
    $validatedData['end_date'] = \Carbon\Carbon::parse($validatedData['end_date'] . '-01')->endOfMonth()->toDateTimeString();

    // حساب الفرق بين التاريخين بالشهور
    $startDate = \Carbon\Carbon::parse($validatedData['start_date']);
    $endDate = \Carbon\Carbon::parse($validatedData['end_date']);
    $months = $startDate->diffInMonths($endDate) + 1;

    // العثور على العقار دون التحقق من التوافر
    $property = Property::find($validatedData['property_id']);
    if (!$property) {
        return response()->json(['error' => 'Property not found'], 404);
    }

    // العثور على الحجز الحالي
    $booking = Booking::find($id);
    if (!$booking) {
        return response()->json(['error' => 'Booking not found'], 404);
    }

    // إذا كان العقار السابق مختلفًا عن العقار الحالي، أعد تعيين التوافر
    if ($booking->property_id != $property->id) {
        $previousProperty = Property::find($booking->property_id);
        if ($previousProperty) {
            $previousProperty->availability = 'available'; // تعيين العقار السابق كمتاح
            $previousProperty->save();
        }
        $property->availability = 'not available'; // تعيين العقار الحالي كغير متاح
        $property->save();
    }

    // حساب السعر الكلي
    $validatedData['total_price'] = $months * $property->price;

    // تحديث بيانات الحجز
    $booking->update($validatedData);

    // إعادة توجيه المستخدم إلى صفحة عرض الحجوزات مع رسالة نجاح
    return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
}

    
    
    
    

    /**
     * Remove the specified booking from storage.
     */
  

     public function destroy($id)
{
    $booking = Booking::find($id);
    
    if ($booking) {
        $property = Property::find($booking->property_id);
        
        if ($property) {
            $property->availability = 'available';
            $property->save();
        }

        $booking->delete();
        
        // إعادة استجابة JSON ناجحة
        return response()->json(['message' => 'Booking deleted successfully.'], 200);
    } else {
        return response()->json(['error' => 'Booking not found.'], 404);
    }
}


}
