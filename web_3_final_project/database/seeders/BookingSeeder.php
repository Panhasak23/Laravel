<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use App\Enums\UserRoleEnum;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Get customers and rooms
        $customers = User::where('role', UserRoleEnum::CUSTOMER)->get();
        $rooms = Room::all();
        
        if ($customers->isEmpty() || $rooms->isEmpty()) {
            return;
        }

        // Pending booking (Bob Smith, Room 105)
        Booking::firstOrCreate(
            ['id' => 101],
            [
                'user_id' => User::where('email', 'bob.smith@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '105')->first()?->id,
                'guest_name' => 'Bob Smith',
                'guest_email' => 'bob.smith@email.com',
                'guest_phone' => '+1-555-0102',
                'check_in' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'check_out' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'status' => 'pending',
                'total_price' => 300.00,
                'promo_code' => null,
            ]
        );

        // Confirmed booking (Carol White, Room 203)
        Booking::firstOrCreate(
            ['id' => 102],
            [
                'user_id' => User::where('email', 'carol.white@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '203')->first()?->id,
                'guest_name' => 'Carol White',
                'guest_email' => 'carol.white@email.com',
                'guest_phone' => '+1-555-0103',
                'check_in' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'check_out' => Carbon::now()->addDays(4)->format('Y-m-d'),
                'status' => 'confirmed',
                'total_price' => 250.00,
                'promo_code' => 'LOYALTY10',
            ]
        );

        // Checked-in booking (Diana Brown, Room 305)
        Booking::firstOrCreate(
            ['id' => 103],
            [
                'user_id' => User::where('email', 'diana.brown@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '305')->first()?->id,
                'guest_name' => 'Diana Brown',
                'guest_email' => 'diana.brown@email.com',
                'guest_phone' => '+1-555-0104',
                'check_in' => Carbon::now()->format('Y-m-d'),
                'check_out' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'status' => 'checked_in',
                'total_price' => 500.00,
                'promo_code' => 'EARLY20',
            ]
        );

        // Checked-out booking (Ethan Davis, Room 101)
        Booking::firstOrCreate(
            ['id' => 104],
            [
                'user_id' => User::where('email', 'ethan.davis@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '101')->first()?->id,
                'guest_name' => 'Ethan Davis',
                'guest_email' => 'ethan.davis@email.com',
                'guest_phone' => '+1-555-0105',
                'check_in' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'check_out' => Carbon::now()->subDays(3)->format('Y-m-d'),
                'status' => 'checked_out',
                'total_price' => 200.00,
                'promo_code' => null,
            ]
        );

        // Cancelled booking (Fiona Miller, Room 402)
        Booking::firstOrCreate(
            ['id' => 105],
            [
                'user_id' => User::where('email', 'fiona.miller@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '402')->first()?->id,
                'guest_name' => 'Fiona Miller',
                'guest_email' => 'fiona.miller@email.com',
                'guest_phone' => '+1-555-0106',
                'check_in' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'check_out' => Carbon::now()->addDays(12)->format('Y-m-d'),
                'status' => 'cancelled',
                'total_price' => 800.00,
                'promo_code' => 'SUMMER30',
            ]
        );

        // Another pending (Grace Lee, Room 207)
        Booking::firstOrCreate(
            ['id' => 106],
            [
                'user_id' => User::where('email', 'grace.lee@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '207')->first()?->id,
                'guest_name' => 'Grace Lee',
                'guest_email' => 'grace.lee@email.com',
                'guest_phone' => '+1-555-0107',
                'check_in' => Carbon::now()->addDays(8)->format('Y-m-d'),
                'check_out' => Carbon::now()->addDays(11)->format('Y-m-d'),
                'status' => 'pending',
                'total_price' => 345.00,
                'promo_code' => 'WEEKEND15',
            ]
        );

        // Another checked-in (Henry Wilson, Room 503)
        Booking::firstOrCreate(
            ['id' => 107],
            [
                'user_id' => User::where('email', 'henry.wilson@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '503')->first()?->id,
                'guest_name' => 'Henry Wilson',
                'guest_email' => 'henry.wilson@email.com',
                'guest_phone' => '+1-555-0108',
                'check_in' => Carbon::now()->subDays(1)->format('Y-m-d'),
                'check_out' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'status' => 'checked_in',
                'total_price' => 700.00,
                'promo_code' => 'FAMILY25',
            ]
        );

        // Checked-out booking (Ivy Martinez, Room 201)
        Booking::firstOrCreate(
            ['id' => 108],
            [
                'user_id' => User::where('email', 'ivy.martinez@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '201')->first()?->id,
                'guest_name' => 'Ivy Martinez',
                'guest_email' => 'ivy.martinez@email.com',
                'guest_phone' => '+1-555-0109',
                'check_in' => Carbon::now()->subDays(10)->format('Y-m-d'),
                'check_out' => Carbon::now()->subDays(8)->format('Y-m-d'),
                'status' => 'checked_out',
                'total_price' => 300.00,
                'promo_code' => null,
            ]
        );

        // Confirmed (Jack Taylor, Room 401)
        Booking::firstOrCreate(
            ['id' => 109],
            [
                'user_id' => User::where('email', 'jack.taylor@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '401')->first()?->id,
                'guest_name' => 'Jack Taylor',
                'guest_email' => 'jack.taylor@email.com',
                'guest_phone' => '+1-555-0110',
                'check_in' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'check_out' => Carbon::now()->addDays(6)->format('Y-m-d'),
                'status' => 'confirmed',
                'total_price' => 1000.00,
                'promo_code' => 'FLASH35',
            ]
        );

        // Checked-out booking (Alice Johnson, Room 301)
        Booking::firstOrCreate(
            ['id' => 110],
            [
                'user_id' => User::where('email', 'alice.johnson@email.com')->first()?->id,
                'room_id' => Room::where('room_number', '301')->first()?->id,
                'guest_name' => 'Alice Johnson',
                'guest_email' => 'alice.johnson@email.com',
                'guest_phone' => '+1-555-0101',
                'check_in' => Carbon::now()->subDays(7)->format('Y-m-d'),
                'check_out' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'status' => 'checked_out',
                'total_price' => 500.00,
                'promo_code' => null,
            ]
        );
    }
}
