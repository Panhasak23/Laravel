<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class GuestBookingController extends Controller
{
    /**
     * Show booking confirmation page for guest
     */
    public function confirmation($booking_id, $email)
    {
        $booking = Booking::where('id', $booking_id)
            ->where('guest_email', $email)
            ->with(['room.category'])
            ->firstOrFail();

        return view('pages.public.booking-confirmation', compact('booking'));
    }

    /**
     * Show guest booking lookup form
     */
    public function lookup()
    {
        return view('pages.public.booking-lookup');
    }

    /**
     * Search for booking by email and booking reference
     */
    public function search(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'booking_reference' => 'required|string',
        ]);

        // Search by email and either booking ID or guest name
        $booking = Booking::where('guest_email', $validated['email'])
            ->where(function ($query) use ($validated) {
                $query->where('id', $validated['booking_reference'])
                      ->orWhere('guest_name', 'like', '%' . $validated['booking_reference'] . '%');
            })
            ->with(['room.category', 'user'])
            ->first();

        if (!$booking) {
            return redirect()->back()->withErrors(['error' => 'Booking not found. Please check your email and booking reference.']);
        }

        return view('pages.public.guest-bookings', compact('booking'));
    }

    /**
     * Show all bookings for a guest (after lookup)
     */
    public function show(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $bookings = Booking::where('guest_email', $validated['email'])
            ->with(['room.category', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        if ($bookings->isEmpty()) {
            return redirect()->route('guest.booking.lookup')->withErrors(['error' => 'No bookings found for this email.']);
        }

        return view('pages.public.guest-bookings-list', compact('bookings'));
    }
}
