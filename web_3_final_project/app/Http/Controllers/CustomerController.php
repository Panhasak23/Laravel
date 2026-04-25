<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class CustomerController extends Controller
{
    public function dashboard()
    {
        // Get bookings for the logged-in customer
        $bookings = Booking::where('user_id', auth()->id())
            ->with(['room.category'])
            ->latest()
            ->get();

        // Calculate stats
        $totalBookings = $bookings->count();
        $upcomingBookings = $bookings->filter(function ($booking) {
            return $booking->check_in >= now()->toDateString() && 
                   in_array($booking->status->value, ['pending', 'confirmed']);
        })->count();
        
        $completedBookings = $bookings->filter(function ($booking) {
            return $booking->status->value === 'checked_out';
        })->count();

        $totalSpent = $bookings->where('status', 'checked_out')->sum('total_price');

        return view('pages.customer.dashboard', compact(
            'bookings',
            'totalBookings',
            'upcomingBookings',
            'completedBookings',
            'totalSpent'
        ));
    }

    public function bookings()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with(['room.category'])
            ->latest()
            ->paginate(10);

        return view('pages.customer.bookings', compact('bookings'));
    }
}

