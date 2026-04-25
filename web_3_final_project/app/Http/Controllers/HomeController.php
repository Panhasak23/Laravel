<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\PromoCode;
use App\Models\Booking;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get check-in and check-out dates from request (if provided)
        $checkIn = $request->query('check_in');
        $checkOut = $request->query('check_out');
        
        $query = Room::with('category')
            ->where('status', 'available'); // Room status must be available
        
        // If dates are provided, filter out rooms with overlapping bookings
        if ($checkIn && $checkOut) {
            $checkInDate = Carbon::parse($checkIn);
            $checkOutDate = Carbon::parse($checkOut);
            
            // Get room IDs with active bookings that overlap these dates
            $bookedRoomIds = Booking::whereIn('status', ['pending', 'confirmed', 'checked_in'])
                ->where('check_in', '<', $checkOutDate)
                ->where('check_out', '>', $checkInDate)
                ->pluck('room_id')
                ->toArray();
            
            // Exclude booked rooms from results
            if (!empty($bookedRoomIds)) {
                $query->whereNotIn('id', $bookedRoomIds);
            }
        }
        
        $rooms = $query->orderBy('room_number')->get();
        $categories = RoomCategory::all();
        
        // Load active promo codes
        $promoCodes = PromoCode::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->orderBy('discount_percent', 'desc')
            ->get();
        
        return view('pages.public.home', compact('rooms', 'categories', 'promoCodes'));
    }
}
