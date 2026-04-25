<?php

namespace App\Services;

use App\Models\Room;
use App\Enums\RoomStatusEnum;
use Carbon\Carbon;

class RoomService
{
    public function getAvailableRooms($checkIn, $checkOut, $categoryId = null)
    {
        $checkInDate = Carbon::parse($checkIn);
        $checkOutDate = Carbon::parse($checkOut);

        $query = Room::with('category')
            ->where('status', RoomStatusEnum::AVAILABLE);

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $availableRooms = [];
        foreach ($query->get() as $room) {
            // Check if room is available for the given dates
            $isAvailable = !\App\Models\Booking::where('room_id', $room->id)
                ->whereIn('status', [\App\Enums\BookingStatusEnum::PENDING, \App\Enums\BookingStatusEnum::CONFIRMED, \App\Enums\BookingStatusEnum::CHECKED_IN])
                ->where(function ($q) use ($checkInDate, $checkOutDate) {
                    $q->where('check_in', '<', $checkOutDate)
                      ->where('check_out', '>', $checkInDate);
                })
                ->exists();

            if ($isAvailable) {
                $availableRooms[] = $room;
            }
        }

        return collect($availableRooms);
    }

    public function updateRoomStatus($roomId, $status)
    {
        $room = Room::find($roomId);
        if ($room) {
            // Use save() instead of update() to avoid the undefined method error
            $room->status = $status;
            $room->save();
            return $room;
        }
        return null;
    }
}