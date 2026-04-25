<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'room_id' => 'required|exists:rooms,id',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:20',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'promo_code' => 'nullable|string|exists:promo_codes,code',
            'is_walk_in' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'check_in.after_or_equal' => 'Check-in date must be today or in the future.',
            'check_out.after' => 'Check-out date must be after check-in date.',
        ];
    }
}