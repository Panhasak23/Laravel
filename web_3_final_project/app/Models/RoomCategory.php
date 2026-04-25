<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    protected $fillable = [
        'name',
        'base_price',
        'capacity',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'capacity' => 'integer',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}