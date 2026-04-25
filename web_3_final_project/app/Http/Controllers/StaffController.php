<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Enums\RoomStatusEnum;
use Carbon\Carbon;

class StaffController extends Controller
{
    public function dashboard()
    {
        // Recent bookings (last 5)
        $recentBookings = Booking::with(['user', 'room.category'])
            ->latest()
            ->take(5)
            ->get();

        // All bookings
        $allBookings = Booking::with(['user', 'room.category'])
            ->latest()
            ->get();

        // All rooms with active bookings info
        $allRooms = Room::with(['category', 'bookings' => function ($query) {
            // Include bookings that are not completed/cancelled
            $query->whereIn('status', ['pending', 'confirmed', 'checked_in']);
        }])->get();

        // Active guests (checked-in or confirmed)
        $activeGuests = Booking::with(['user', 'room.category'])
            ->whereIn('status', ['checked_in', 'confirmed'])
            ->get();

        // Stats
        $totalBookings = Booking::count();
        $confirmedBookings = Booking::where('status', 'confirmed')->whereDate('created_at', Carbon::today())->count();
        
        // Available rooms: rooms without active bookings
        $occupiedRoomIds = Booking::whereIn('status', ['pending', 'confirmed', 'checked_in'])->distinct('room_id')->pluck('room_id');
        $availableRooms = Room::whereNotIn('id', $occupiedRoomIds)->count();
        
        $totalGuests = Booking::whereDate('check_in', Carbon::today())->count();

        // Dirty rooms needing cleaning
        $dirtyRooms = Room::with('category')
            ->where('status', 'dirty')
            ->get();

        return view('pages.staff.dashboard', compact(
            'recentBookings',
            'allBookings',
            'allRooms',
            'activeGuests',
            'dirtyRooms',
            'totalBookings',
            'confirmedBookings',
            'availableRooms',
            'totalGuests'
        ));
    }
}