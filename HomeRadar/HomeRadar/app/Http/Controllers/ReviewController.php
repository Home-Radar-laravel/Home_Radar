<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Client;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReviewController extends Controller
{
    /**
     * Display a listing of the reviews.
     */
    public function index()
    {
        try {
            $reviews = Review::with(['client', 'property'])->get();
            return response()->json(['data' => $reviews], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to retrieve reviews',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'likes' => 'nullable|integer|min:0',
                'rating' => 'required|integer|min:1|max:5',
                'client_id' => 'required|exists:clients,id',
                'property_id' => 'required|exists:properties,id',
            ]);

            $review = Review::create($validatedData);

            return response()->json(['data' => $review, 'message' => 'Review created successfully'], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation Error',
                'messages' => $e->errors(),
                'trace' => $e->getTraceAsString()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create review',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    /**
     * Display the specified review.
     */
    public function show(Review $review)
    {
        try {
            $review->load(['client', 'property']);
            return response()->json(['data' => $review], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to retrieve review',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    /**
     * Update the specified review in storage.
     */
    public function update(Request $request, Review $review)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'sometimes|string|max:255',
                'content' => 'sometimes|string',
                'likes' => 'nullable|integer|min:0',
                'rating' => 'sometimes|integer|min:1|max:5',
                'client_id' => 'sometimes|exists:clients,id',
                'property_id' => 'sometimes|exists:properties,id',
            ]);

            $review->update($validatedData);

            return response()->json(['data' => $review, 'message' => 'Review updated successfully'], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Validation Error',
                'messages' => $e->errors(),
                'trace' => $e->getTraceAsString()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update review',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review)
    {
        try {
            $review->delete();
            return response()->json(['message' => 'Review deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete review',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}
