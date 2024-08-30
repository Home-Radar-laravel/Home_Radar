<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class admin_PropertyController extends Controller
{
    /**
     * Store a newly created property in storage.
     */
    public function store(Request $request)
    {
        try {
            // التحقق والتحقق من صحة البيانات
            $validatedData = $request->validate([
                'property_name' => 'sometimes|string|max:255',
                'price' => 'sometimes|numeric|min:0',
                'property_size' => 'sometimes|numeric|min:0',
                'garage_size' => 'nullable|numeric|min:0',
                'rooms' => 'sometimes|integer|min:0',
                'bathrooms' => 'sometimes|integer|min:0',
                'availability' => 'sometimes|in:available,not available',
                'description' => 'nullable|string',
                'location' => 'sometimes|string|max:255',
                'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'image6' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            // Assuming renter_id is set to 1 for now. Replace with actual logic to get the renter_id
            // $validatedData['renter_id'] = 1;
    // dd($validatedData);
            // تخزين الصور وتحميل المسارات إلى البيانات المعتمدة
            foreach (['image1', 'image2', 'image3', 'image4', 'image5', 'image6'] as $imageField) {
                if ($request->hasFile($imageField)) {
                    $validatedData[$imageField] = $request->file($imageField)->store('public/properties');
                }
            }
    
            // إنشاء العقار باستخدام البيانات المعتمدة
            $property = Property::create($validatedData);
    
            return redirect()->route('properties.create')->with('success', 'Property created successfully!');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create property: ' . $e->getMessage())->withInput();
        }
    }
    
    

    /**
     * Update the specified property in storage.
     */
    public function update(Request $request, $id)
{
    try {
        // الحصول على العقار حسب المعرف (ID)
        $property = Property::findOrFail($id);

        // تحقق وتحقق من صحة البيانات
        $validatedData = $request->validate([
            'property_name' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'property_size' => 'sometimes|numeric|min:0',
            'garage_size' => 'nullable|numeric|min:0',
            'rooms' => 'sometimes|integer|min:0',
            'bathrooms' => 'sometimes|integer|min:0',
            'availability' => 'sometimes|in:available,not available',
            'description' => 'nullable|string',
            'location' => 'sometimes|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image6' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // تحديث الصور
        foreach (['image1', 'image2', 'image3', 'image4', 'image5', 'image6'] as $imageField) {
            if ($request->hasFile($imageField)) {
                // حذف الصورة القديمة
                if ($property->$imageField) {
                    Storage::delete($property->$imageField);
                }

                // تخزين الصورة الجديدة
                $validatedData[$imageField] = $request->file($imageField)->store('public/properties');
            }
        }

        // ملء البيانات وحفظ التحديثات
        $property->fill($validatedData);
        $property->save();

        return redirect()->route('properties.create')->with('success', 'Property updated successfully!');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update property: ' . $e->getMessage())->withInput();
    }
}

    
    
    public function updateAvailability(Request $request, $id)
    {
        // البحث عن العنصر حسب ID
        $property = Property::findOrFail($id);
    
        // تحديث قيمة availability
        $property->availability = $request->availability;
        $property->save();
    
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->back()->with('success', 'Availability updated successfully!');
    }
    /**
     * Remove the specified property from storage.
     */

    
public function destroy($id)
{
    $property = Property::find($id);
    if ($property) {
        $property->delete();
        return response()->json(['success' => 'Property deleted successfully.'], 200);
    } else {
        return response()->json(['error' => 'Property not found.'], 404);
    }
}

    /**
     * Display a listing of the properties.
     */
    public function admin_index()
{
    $properties = Property::paginate(10); // تعديل حسب الحاجة
    $totalProperties = Property::count(); // إجمالي عدد العقارات
    
    return view('properties.index', [
        'properties' => $properties,
        'totalProperties' => $totalProperties,
    ]);
}
    /**
     * Show the form for creating a new property.
     */

     public function add()
    {
        return view('properties.create');
    }

    public function create()
    {
        $properties = Property::paginate(10); // تعديل حسب الحاجة
    $totalProperties = Property::count(); // إجمالي عدد العقارات
    
    return view('properties.index', [
        'properties' => $properties,
        'totalProperties' => $totalProperties,
    ]);

    }



    /**
     * Show the form for editing the specified property.
     */
    public function edit($id)
    {
        // البحث عن العقار بواسطة الـ ID
        $property = Property::find($id);
    
        // التحقق من وجود العقار
        if (!$property) {
            return redirect()->route('properties.index')->with('error', 'Property not found.');
        }
    
        // عرض صفحة التعديل مع تمرير بيانات العقار
        return view('properties.edit', compact('property'));
    }

    /**
     * Display the specified property.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}
