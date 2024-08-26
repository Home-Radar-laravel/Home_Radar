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
        $clients = Client::all();
        $properties = Property::where('availability', 1)->get(); // Only get available properties
        return view('bookings.create', compact('clients', 'properties'));
    }
    
    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date_format:Y-m',
            'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
            'payment_status' => 'required|string|in:paid,pending',
        ]);
    
        // تحويل start_date و end_date إلى بداية ونهاية الشهر
        $validatedData['start_date'] = $validatedData['start_date'] . '-01';
        $validatedData['end_date'] = date('Y-m-t', strtotime($validatedData['end_date'] . '-01'));
    
        // حساب الفرق بين التاريخين بالشهور
        $startDate = new \DateTime($validatedData['start_date']);
        $endDate = new \DateTime($validatedData['end_date']);
        $interval = $startDate->diff($endDate);
        $months = ($interval->y * 12) + $interval->m + 1; // لحساب عدد الشهور بالكامل
    
        // الحصول على سعر العقار
        $property = Property::find($validatedData['property_id']);
        if ($property) {
            $validatedData['total_price'] = $months * $property->price; // حساب السعر الكلي
            $property->availability = 0; // تعيين العقار كغير متاح
            $property->save();
        } else {
            return redirect()->back()->withErrors('Property not found');
        }
    
        // إنشاء حجز جديد
        Booking::create($validatedData);
    
        // إعادة توجيه المستخدم إلى صفحة عرض الحجوزات مع رسالة نجاح
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully');
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
        $clients = Client::all();
        $properties = Property::all();
        return view('bookings.edit', ['booking' => $booking, 'clients' => $clients, 'properties' => $properties]);
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, $id)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date_format:Y-m',
            'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
            'payment_status' => 'required|string|in:paid,pending',
        ]);
    
        // تحويل start_date و end_date إلى بداية ونهاية الشهر
        $validatedData['start_date'] = $validatedData['start_date'] . '-01';
        $validatedData['end_date'] = date('Y-m-t', strtotime($validatedData['end_date'] . '-01'));
    
        // حساب الفرق بين التاريخين بالشهور
        $startDate = new \DateTime($validatedData['start_date']);
        $endDate = new \DateTime($validatedData['end_date']);
        $interval = $startDate->diff($endDate);
        $months = ($interval->y * 12) + $interval->m + 1; // لحساب عدد الشهور بالكامل
    
        // الحصول على سعر العقار
        $property = Property::find($validatedData['property_id']);
        if ($property) {
            $validatedData['total_price'] = $months * $property->price; // حساب السعر الكلي
    
            // إذا كان العقار السابق مختلفًا عن العقار الحالي، أعد تعيين التوافر
            $booking = Booking::find($id);
            if ($booking->property_id != $property->id) {
                $previousProperty = Property::find($booking->property_id);
                if ($previousProperty) {
                    $previousProperty->availability = 1; // تعيين العقار السابق كمتاح
                    $previousProperty->save();
                }
                $property->availability = 0; // تعيين العقار الحالي كغير متاح
                $property->save();
            }
        } else {
            return redirect()->back()->withErrors('Property not found');
        }
    
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
        $booking->delete();
        return response()->json(['success' => 'Property deleted successfully.'], 200);
    } else {
        return response()->json(['error' => 'Property not found.'], 404);
    }
}

}
