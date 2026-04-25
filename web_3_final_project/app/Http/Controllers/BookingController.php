<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use App\Services\BookingService;
use App\Models\Room;
use App\Models\Booking;
use App\Enums\RoomStatusEnum;
use App\Enums\BookingStatusEnum;
use Illuminate\Support\Facades\Cache;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function store(StoreBookingRequest $request)
    {
        try {
            $data = $request->validated();
            // Only set user_id if user is authenticated
            $data['user_id'] = auth()->check() ? auth()->id() : null;

            $booking = $this->bookingService->createBooking($data);

            // Return JSON for AJAX requests, redirect for form submissions
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Booking created successfully!',
                    'booking' => $booking,
                    'booking_id' => $booking->id,
                    'guest_email' => $booking->guest_email,
                ], 201);
            }

            // For guest bookings, redirect to booking confirmation page
            if (!auth()->check()) {
                return redirect()->route('guest.booking.confirmation', [
                    'booking_id' => $booking->id,
                    'email' => $booking->guest_email
                ])->with('success', 'Booking created successfully! Check your email for confirmation.');
            }

            return redirect()->route('customer.bookings')->with('success', 'Booking created successfully!');
        } catch (\Exception $e) {
            // Return JSON for AJAX requests, redirect for form submissions
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 422);
            }

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateStatus(Request $request, $bookingId)
    {
        try {
            $booking = Booking::findOrFail($bookingId);
            
            // Validate the new status
            $request->validate([
                'status' => 'required|string|in:pending,confirmed,checked_in,checked_out,no_show,cancelled',
            ]);

            $newStatus = $request->input('status');
            $booking->status = $newStatus;
            $booking->save();

            // Update room status based on booking status
            if ($newStatus === 'checked_in') {
                // Mark room as OCCUPIED when guest checks in
                Room::where('id', $booking->room_id)
                    ->update(['status' => RoomStatusEnum::OCCUPIED->value]);
            } elseif ($newStatus === 'checked_out') {
                // Mark room as DIRTY when guest checks out
                Room::where('id', $booking->room_id)
                    ->update(['status' => RoomStatusEnum::DIRTY->value]);
            } elseif ($newStatus === 'no_show' || $newStatus === 'cancelled') {
                // If booking is no-show or cancelled, check if there are other active bookings
                $hasActiveBookings = Booking::where('room_id', $booking->room_id)
                    ->where('id', '!=', $booking->id)
                    ->whereIn('status', ['pending', 'confirmed', 'checked_in'])
                    ->exists();
                
                if (!$hasActiveBookings) {
                    Room::where('id', $booking->room_id)
                        ->update(['status' => RoomStatusEnum::AVAILABLE->value]);
                }
            }

            // Clear all caches to ensure fresh data
            Cache::flush();

            // Return JSON response
            return response()->json([
                'success' => true,
                'message' => 'Booking status updated successfully!',
                'booking' => $booking,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    public function markRoomCleaned(Request $request, $roomId)
    {
        try {
            $room = Room::findOrFail($roomId);
            // Mark room as available if it's dirty
            if ($room->status === RoomStatusEnum::DIRTY) {
                $room->status = RoomStatusEnum::AVAILABLE;
                $room->save();
            }

            // Clear all caches
            Cache::flush();

            return response()->json([
                'success' => true,
                'message' => 'Room marked as cleaned and available!',
                'room_id' => $roomId,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}