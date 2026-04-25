<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoCode;
use Illuminate\Support\Facades\Auth;

class PromoCodeController extends Controller
{
    public function store(Request $request)
    {
        // Only admins can create promo codes
        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'code' => 'required|string|unique:promo_codes|max:20',
            'discount_percent' => 'required|numeric|min:0|max:100',
            'is_active' => 'required|boolean',
            'expires_at' => 'nullable|date',
        ]);

        $promoCode = PromoCode::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Promo code created successfully!',
            'promo_code' => $promoCode,
        ], 201);
    }

    public function update(Request $request, PromoCode $promoCode)
    {
        // Only admins can update promo codes
        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'is_active' => 'required|boolean',
        ]);

        $promoCode->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Promo code updated successfully!',
            'promo_code' => $promoCode,
        ]);
    }

    public function destroy(PromoCode $promoCode)
    {
        // Only admins can delete promo codes
        if (Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $promoCode->delete();

        return response()->json([
            'success' => true,
            'message' => 'Promo code deleted successfully!',
        ]);
    }
}
