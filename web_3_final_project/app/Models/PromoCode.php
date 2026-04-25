<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_percent',
        'is_active',
        'expires_at',
    ];

    protected $casts = [
        'discount_percent' => 'decimal:2',
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];
}