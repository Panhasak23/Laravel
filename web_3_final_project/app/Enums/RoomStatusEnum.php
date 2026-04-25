<?php

namespace App\Enums;

enum RoomStatusEnum: string
{
    case AVAILABLE = 'available';
    case OCCUPIED = 'occupied';
    case DIRTY = 'dirty';
}