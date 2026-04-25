<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Room;
use App\Models\PromoCode;
use App\Enums\BookingStatusEnum;
use App\Enums\RoomStatusEnum;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class BookingService
{
    public function checkAvailability($roomId, $checkIn, $checkOut)
    {
        // Convert to Carbon instances if they're strings
        $checkInDate = Carbon::parse($checkIn);
        $checkOutDate = Carbon::parse($checkOut);

        // Check if room exists and is available
        $room = Room::find($roomId);
        if (!$room || $room->status !== RoomStatusEnum::AVAILABLE) {
            return false;
        }

        // Check for overlapping bookings
        $overlappingBookings = Booking::where('room_id', $roomId)
            ->whereIn('status', [BookingStatusEnum::PENDING, BookingStatusEnum::CONFIRMED, BookingStatusEnum::CHECKED_IN])
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where('check_in', '<', $checkOutDate)
                      ->where('check_out', '>', $checkInDate);
            })
            ->exists();

        return !$overlappingBookings;
    }

    public function calculatePrice($roomId, $checkIn, $checkOut, $promoCode = null)
    {
        $checkInDate = Carbon::parse($checkIn);
        $checkOutDate = Carbon::parse($checkOut);
        
        $days = $checkInDate->diffInDays($checkOutDate);
        $room = Room::with('category')->find($roomId);
        
        $basePrice = $room->category->base_price;
        $totalPrice = $basePrice * $days;

        // Apply promo code if valid
        if ($promoCode) {
            $promoCodeModel = $this->validatePromoCode($promoCode);
            if ($promoCodeModel) {
                $discountAmount = ($totalPrice * $promoCodeModel->discount_percent) / 100;
                $totalPrice -= $discountAmount;
            }
        }

        return max(0, $totalPrice); // Ensure price doesn't go negative
    }

    public function validatePromoCode($code)
    {
        $promoCode = PromoCode::where('code', $code)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->first();

        return $promoCode;
    }

    public function createBooking($data)
    {
        DB::beginTransaction();
        
        try {
            $isAvailable = $this->checkAvailability(
                $data['room_id'],
                $data['check_in'],
                $data['check_out']
            );

            if (!$isAvailable) {
                throw new \Exception('Room is not available for selected dates');
            }

            $totalPrice = $this->calculatePrice(
                $data['room_id'],
                $data['check_in'],
                $data['check_out'],
                $data['promo_code'] ?? null
            );

            // Walk-in bookings start as checked_in, online bookings start as pending
            $status = (!empty($data['is_walk_in']) && $data['is_walk_in'] === true) 
                ? BookingStatusEnum::CHECKED_IN 
                : BookingStatusEnum::PENDING;

            $booking = Booking::create([
                'user_id' => $data['user_id'],
                'room_id' => $data['room_id'],
                'guest_name' => $data['guest_name'],
                'guest_email' => $data['guest_email'],
                'guest_phone' => $data['guest_phone'],
                'check_in' => $data['check_in'],
                'check_out' => $data['check_out'],
                'status' => $status,
                'total_price' => $totalPrice,
                'promo_code' => $data['promo_code'] ?? null,
            ]);

            // Set room status to OCCUPIED if this is a walk-in check-in
            if ($status === BookingStatusEnum::CHECKED_IN) {
                Room::where('id', $data['room_id'])
                    ->update(['status' => RoomStatusEnum::OCCUPIED->value]);
            }

            DB::commit();
            
            // Clear caches to ensure fresh room data
            Cache::flush();
            
            return $booking;

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}