<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\RoomStatusEnum;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'category_id',
        'status',
    ];

    protected $casts = [
        'status' => RoomStatusEnum::class,
    ];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}