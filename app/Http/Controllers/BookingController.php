<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Get all bookings for the authenticated user
     */
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        
        $query = Booking::query();

        // Filter based on user type
        if ($user->user_type === 'customer') {
            $query->where('customer_id', $user->id);
        } elseif ($user->user_type === 'provider') {
            $query->where('provider_id', $user->id);
        }

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->has('from_date') && $request->has('to_date')) {
            $query->whereBetween('appointment_date', [
                $request->from_date,
                $request->to_date
            ]);
        }

        // Get upcoming or past bookings
        if ($request->has('type')) {
            if ($request->type === 'upcoming') {
                $query->upcoming();
            } elseif ($request->type === 'past') {
                $query->past();
            }
        }

        // Sort by date
        $sortBy = $request->get('sort_by', 'appointment_date');
        $sortOrder = $request->get('sort_order', 'asc');
        $query->orderBy($sortBy, $sortOrder);

        // Paginate results
        $perPage = $request->get('per_page', 10);
        $bookings = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'message' => 'Bookings retrieved successfully',
            'data' => [
                'bookings' => $bookings->items(),
                'pagination' => [
                    'total' => $bookings->total(),
                    'per_page' => $bookings->perPage(),
                    'current_page' => $bookings->currentPage(),
                    'last_page' => $bookings->lastPage(),
                    'from' => $bookings->firstItem(),
                    'to' => $bookings->lastItem(),
                ]
            ]
        ]);
    }

    /**
     * Get a specific booking
     */
    public function show(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        }

        // Check authorization
        if ($booking->customer_id !== $user->id && $booking->provider_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $bookingData = $booking->toArray();
        $bookingData['service'] = $booking->service;
        $bookingData['provider'] = $booking->provider;
        $bookingData['customer'] = $booking->customer;
        $bookingData['can_cancel'] = $booking->can_cancel;
        $bookingData['can_reschedule'] = $booking->can_reschedule;
        $bookingData['is_upcoming'] = $booking->is_upcoming;
        $bookingData['is_past'] = $booking->is_past;

        return response()->json([
            'success' => true,
            'message' => 'Booking retrieved successfully',
            'data' => [
                'booking' => $bookingData
            ]
        ]);
    }

    /**
     * Create a new booking
     */
    public function store(Request $request): JsonResponse
    {
        $user = $request->user();

        // Only customers can create bookings
        if ($user->user_type !== 'customer') {
            return response()->json([
                'success' => false,
                'message' => 'Only customers can create bookings'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'provider_id' => 'required|exists:users,id',
            'business_id' => 'required|exists:businesses,id',
            'appointment_date' => 'required|date|after:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'duration' => 'required|integer|min:15',
            'notes' => 'nullable|string|max:1000',
            'customer_notes' => 'nullable|string|max:1000',
            'participants' => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $booking = Booking::create([
                'business_id' => $request->business_id,
                'service_id' => $request->service_id,
                'provider_id' => $request->provider_id,
                'customer_id' => $user->id,
                'appointment_date' => $request->appointment_date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'duration' => $request->duration,
                'notes' => $request->notes,
                'customer_notes' => $request->customer_notes,
                'participants' => $request->participants ?? 1,
                'status' => 'pending',
                'payment_status' => 'pending',
                'total_price' => $request->total_price ?? 0,
                'currency' => 'SAR',
            ]);

            $bookingData = $booking->toArray();
            $bookingData['service'] = $booking->service;
            $bookingData['provider'] = $booking->provider;

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully',
                'data' => [
                    'booking' => $bookingData
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update a booking
     */
    public function update(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        }

        // Check authorization - only creator or provider can update
        if ($booking->customer_id !== $user->id && $booking->provider_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        $validator = Validator::make($request->all(), [
            'appointment_date' => 'sometimes|date|after:today',
            'start_time' => 'sometimes|date_format:H:i',
            'end_time' => 'sometimes|date_format:H:i',
            'duration' => 'sometimes|integer|min:15',
            'notes' => 'nullable|string|max:1000',
            'customer_notes' => 'nullable|string|max:1000',
            'status' => 'sometimes|in:pending,confirmed,in_progress,completed,cancelled,no_show',
            'participants' => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Prevent updating cancelled bookings
            if ($booking->status === 'cancelled') {
                return response()->json([
                    'success' => false,
                    'message' => 'Cannot update a cancelled booking'
                ], 400);
            }

            $booking->update($validator->validated());

            $bookingData = $booking->toArray();
            $bookingData['service'] = $booking->service;
            $bookingData['provider'] = $booking->provider;

            return response()->json([
                'success' => true,
                'message' => 'Booking updated successfully',
                'data' => [
                    'booking' => $bookingData
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking update failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cancel a booking
     */
    public function cancel(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        }

        // Check authorization
        if ($booking->customer_id !== $user->id && $booking->provider_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        // Check if booking can be cancelled
        if (!$booking->can_cancel) {
            return response()->json([
                'success' => false,
                'message' => 'This booking cannot be cancelled'
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'cancellation_reason' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $booking->cancel($request->cancellation_reason);

            return response()->json([
                'success' => true,
                'message' => 'Booking cancelled successfully',
                'data' => [
                    'booking' => $booking->toArray()
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking cancellation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Confirm a booking (provider only)
     */
    public function confirm(Request $request, $id): JsonResponse
    {
        $user = $request->user();
        
        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        }

        // Only provider can confirm
        if ($booking->provider_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Only provider can confirm this booking'
            ], 403);
        }

        try {
            $booking->confirm();

            return response()->json([
                'success' => true,
                'message' => 'Booking confirmed successfully',
                'data' => [
                    'booking' => $booking->toArray()
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Booking confirmation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available slots for a service
     */
    public function availableSlots(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'provider_id' => 'required|exists:users,id',
            'date' => 'required|date|after:today',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $slots = Booking::getAvailableSlots(
                $request->service_id,
                $request->provider_id,
                $request->date
            );

            return response()->json([
                'success' => true,
                'message' => 'Available slots retrieved successfully',
                'data' => [
                    'slots' => $slots
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve available slots',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
