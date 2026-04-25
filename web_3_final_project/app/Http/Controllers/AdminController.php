<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use App\Models\PromoCode;
use App\Enums\UserRoleEnum;
use App\Enums\RoomStatusEnum;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Revenue stats
        $totalRevenue = Booking::sum('total_price');
        $totalBookings = Booking::count();
        $occupancyRate = (Room::where('status', 'occupied')->count() / Room::count()) * 100;
        
        // All bookings
        $allBookings = Booking::with(['user', 'room.category'])->latest()->get();
        
        // Staff
        $staffMembers = User::where('role', UserRoleEnum::STAFF)->get();
        
        // Activity
        $recentActivity = Booking::with(['user', 'room.category'])
            ->latest()
            ->take(10)
            ->get();

        // Promo Codes
        $promoList = PromoCode::orderBy('created_at', 'desc')->get();

        // Chart Data - Revenue by room category
        $revenueByCategory = Booking::join('rooms', 'bookings.room_id', '=', 'rooms.id')
            ->join('room_categories', 'rooms.category_id', '=', 'room_categories.id')
            ->selectRaw('room_categories.name, SUM(bookings.total_price) as total')
            ->groupBy('room_categories.id', 'room_categories.name')
            ->get();

        // Chart Data - Bookings by status
        $bookingsByStatus = Booking::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->get();

        // Chart Data - Last 30 days revenue
        $last30Days = [];
        $revenueData = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $last30Days[] = Carbon::parse($date)->format('M d');
            $revenue = Booking::whereDate('created_at', $date)->sum('total_price');
            $revenueData[] = (float)$revenue;
        }

        // Dirty rooms needing cleaning
        $dirtyRooms = Room::with('category')
            ->where('status', RoomStatusEnum::DIRTY->value)
            ->get();

        // Chart Data - Occupancy by room type
        $occupancyByType = Room::join('room_categories', 'rooms.category_id', '=', 'room_categories.id')
            ->selectRaw('room_categories.name, COUNT(*) as total, SUM(CASE WHEN rooms.status = "occupied" THEN 1 ELSE 0 END) as occupied')
            ->groupBy('room_categories.id', 'room_categories.name')
            ->get();

        return view('pages.admin.dashboard', compact(
            'totalRevenue',
            'totalBookings',
            'dirtyRooms',
            'occupancyRate',
            'allBookings',
            'staffMembers',
            'recentActivity',
            'promoList',
            'revenueByCategory',
            'bookingsByStatus',
            'last30Days',
            'revenueData',
            'occupancyByType'
        ));
    }

    /**
     * Show user management page
     */
    public function users()
    {
        $users = User::all();
        $staffMembers = User::where('role', UserRoleEnum::STAFF)->count();
        $admins = User::where('role', UserRoleEnum::ADMIN)->count();
        $customers = User::where('role', UserRoleEnum::CUSTOMER)->count();

        return view('pages.admin.users', compact('users', 'staffMembers', 'admins', 'customers'));
    }
}