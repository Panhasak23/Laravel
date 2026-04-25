<?php

namespace App\Services;

use App\Models\PromoCode;
use Carbon\Carbon;

class PromoCodeService
{
    public function validate($code)
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

    public function applyDiscount($originalPrice, $promoCode)
    {
        if (!$promoCode instanceof PromoCode) {
            $promoCode = $this->validate($promoCode);
        }

        if (!$promoCode) {
            return $originalPrice;
        }

        $discountAmount = ($originalPrice * $promoCode->discount_percent) / 100;
        $discountedPrice = $originalPrice - $discountAmount;

        return max(0, $discountedPrice); // Ensure price doesn't go negative
    }
}