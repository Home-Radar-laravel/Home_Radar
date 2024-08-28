<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $renters = Renter::with(['roles', 'properties'])->get();
            return response()->json(['data' => $renters], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve renters', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'renter_name' => 'required|string|max:255',
                'renter_phone' => 'required|string|max:20',
                'renter_email' => 'required|email|unique:renters,renter_email',
                'password' => 'required|string|min:8',
                'address' => 'required|string|max:255',
            ]);

            // Set the fixed role_id to 2
            $validatedData['role_id'] = 2;
            $validatedData['password'] = Hash::make($validatedData['password']);

            $renter = Renter::create($validatedData);

            return response()->json(['data' => $renter, 'message' => 'Renter created successfully'], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create renter', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Renter $renter)
    {
        try {
            $renter->load(['roles', 'properties']);
            return response()->json(['data' => $renter], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve renter', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Renter $renter)
    {
        try {
            $validatedData = $request->validate([
                'renter_name' => 'sometimes|string|max:255',
                'renter_phone' => 'sometimes|string|max:20',
                'renter_email' => 'sometimes|email|unique:renters,renter_email,' . $renter->id,
                'password' => 'sometimes|string|min:8',
                'address' => 'sometimes|string|max:255',
            ]);

            if ($request->has('role_id') && $request->input('role_id') != 2) {
                return response()->json(['error' => 'Invalid role_id. Only role_id = 2 is allowed.'], 422);
            }

            if ($request->has('password')) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $renter->update($validatedData);

            return response()->json(['data' => $renter, 'message' => 'Renter updated successfully'], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update renter', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renter $renter)
    {
        try {
            $renter->delete();
            return response()->json(['message' => 'Renter deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete renter', 'message' => $e->getMessage()], 500);
        }
    }
}
