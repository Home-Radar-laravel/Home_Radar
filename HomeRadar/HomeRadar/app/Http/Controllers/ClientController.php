<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clients = Client::all();
            if ($clients->isEmpty()) {
                return response()->json(['message' => 'No clients found'], 404);
            }
            return response()->json(['data' => $clients], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve clients', 'message' => $e->getMessage()], 500);
        }
    }





    public function showAddBookingForm()
{
    // Fetch clients from the database
    $clients = Client::all();

    // Pass clients to the view
    return view('add-booking', compact('clients'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'client_name' => 'required|string|max:255',
                'client_phone' => 'required|string|max:20',
                'client_email' => 'required|email|unique:clients,client_email',
                'password' => 'required|string|min:8',
                'role_id' => 'required|exists:roles,id', // Check if role_id exists in roles table
            ]);

            if ($validatedData['role_id'] != 3) {
                return response()->json(['error' => 'Invalid role_id. Only role_id = 2 is allowed.'], 422);
            }

            $validatedData['password'] = Hash::make($validatedData['password']);

            $client = Client::create($validatedData);

            return response()->json(['data' => $client, 'message' => 'Client created successfully'], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create client', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        try {
            if (!$client) {
                return response()->json(['message' => 'Client not found'], 404);
            }
            return response()->json(['data' => $client], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve client', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        try {
            $validatedData = $request->validate([
                'client_name' => 'sometimes|string|max:255',
                'client_phone' => 'sometimes|string|max:20',
                'client_email' => 'sometimes|email|unique:clients,client_email,' . $client->id,
                'password' => 'sometimes|string|min:8',
                'role_id' => 'sometimes|exists:roles,id',
            ]);

            if ($request->has('role_id') && $request->input('role_id') != 3) {
                return response()->json(['error' => 'Invalid role_id. Only role_id = 2 is allowed.'], 422);
            }

            if ($request->has('password')) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $client->update($validatedData);

            return response()->json(['data' => $client, 'message' => 'Client updated successfully'], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update client', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            if (!$client) {
                return response()->json(['message' => 'Client not found'], 404);
            }

            $client->delete();

            return response()->json(['message' => 'Client deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete client', 'message' => $e->getMessage()], 500);
        }
    }
}
